/*!
 * ready.js - "spy" on your page to better determine when a page load is complete
 *
 * @copyright 2013 Anthon Pang
 * @license MIT
 * @author Anthon Pang <apang@softwaredevelopment.ca>
 */

/**
 * ReadyJS
 */
ReadyJS = typeof ReadyJS === 'object' ? ReadyJS : (function () {
    var VERSION = '0.1',
        originalInsertBefore = HTMLElement.prototype.insertBefore,
        originalAppendChild = HTMLElement.prototype.appendChild,
        originalSetTimeout = window.setTimeout,
        originalAddEventListener = document.addEventListener,
        originalXMLHttpRequestOpen = XMLHttpRequest.prototype.open,
        timerCounter = 0,
        eventCounter = 0,
        scriptCounter = 0,
        ajaxCounter = 0,
        loaded = false;

    /**
     * Track dynamically added <script> tags
     *
     * @param {HTMLElement} element
     */
    function scriptTracker(element)
    {
        if (element instanceof HTMLScriptElement) {
            var originalOnLoad = element.onload;

            scriptCounter++;

            element.onload = function () {
                if (originalOnLoad !== null) {
                    originalOnLoad.call(this);
                }

                scriptCounter--;
            };
        }
    }

    /**
     * Spy on HTMLElement.insertBefore()
     *
     * @param {HTMLElement} newElement
     * @param {HTMLElement} referenceElement
     *
     * @return {HTMLElement}
     */
    HTMLElement.prototype.insertBefore = function (newElement, referenceElement)
    {
        scriptTracker(newElement);

        return originalInsertBefore.apply(this, arguments);
    };

    /**
     * Spy on HTMLElement.appendChild()
     *
     * @param {HTMLElement} child
     *
     * @return {HTMLElement}
     */
    HTMLElement.prototype.appendChild = function (child)
    {
        scriptTracker(child);

        return originalAppendChild.apply(this, arguments);
    };

    /**
     * Spy on window.setTimeout()
     *
     * @param {Function} callback
     * @param {Integer}  t
     *
     * @return {Integer}
     */
    window.setTimeout = function (callback, t) {
        var id = originalSetTimeout(function () {
            callback();

            timerCounter--;
        }, t);

        timerCounter++;

        return id;
    };

    /**
     * Spy on document.addEventListener()
     *
     * @param {String}   type
     * @param {Function} listener
     * @param {Boolean}  useCapture
     */
    document.addEventListener = function (type, listener, useCapture) {
        if (typeof useCapture === 'undefined') {
            useCapture = false;
        }

        if (type === 'DOMContentLoaded' || type === 'load') {
            eventCounter++;

            originalAddEventListener.call(
                document,
                type,
                function (e) {
                    listener(e);

                    eventCounter--;
                },
                useCapture
            );
        } else {
            originalAddEventListener.call(document, type, listener, useCapture);
        }
    };

    /**
     * Spy on XMLHttpRequest.open()
     */
    XMLHttpRequest.prototype.open = function () {
        ajaxCounter++;

        // event listeners must be added before calling open() otherwise the progress events won't fire
        this.addEventListener(
            'loadend',
            function (e) {
                ajaxCounter--;
            },
            false
        );

        originalXMLHttpRequestOpen.apply(this, arguments);
    };

    /**
     * Spy on window.load
     */
    window.addEventListener('load', function () {
        loaded = true;
    });

    // Public API methods
    return {
        /**
         * Get readiness status (i.e., flags and counters)
         *
         * @return {Object}
         */
        getStatus : function () {
            return {
                loaded: loaded,
                scripts: scriptCounter,
                timers: timerCounter,
                ajax: ajaxCounter,
                events: eventCounter
            };
        },

        /**
         * Naive isReady() - is window loaded and all counters equal to zero?
         *
         * @return {Boolean}
         */
        isReady : function () {
            return loaded && scriptCounter === 0 && timerCounter === 0 && ajaxCounter === 0 && eventCounter === 0;
        },

        /**
         * Semantic version of this library
         *
         * @return {String}
         */
        getVersion : function () {
            return VERSION;
        }
    };
})();
