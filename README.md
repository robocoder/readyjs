ReadyJS
=======

ReadyJS spies on your page to better determine when a page load is "complete".

Background
----------

[Selenium](http://www.seleniumhq.org/) claims, in
["WaitForPageLoad Returns Too Soon"](http://docs.seleniumhq.org/docs/appendix_migrating_from_rc_to_webdriver.jsp#waitforpagetoload-returns-too-soon),
that WebDriver tries to emulate the original Selenium 1 behaviour to detect when
a page load is complete. Where page loads return too soon, the proposed workaround
is to wait until an expected element (to be interacted with) is visible.

"Wait until" entails:

* coupling to specific pages and/or elements;
* the need to re-assert the condition to determine whether it timed out
or was the desired condition met?

Conversely, "wait X seconds" is arguably worse.

* timings are sensitive to the system environment;
* timings that are padded out increase the time to execute a test suite.

Furthermore, both approaches increase test bloat.

Readiness?
----------

ReadyJS revisits the concept of "readiness", i.e., when is a page ready to be
interacted with?  The approach here is to wait for asynchronous requests to
be completed.

To begin, we include "ready.js" into a page before any asynchronous requests are
made.

    Use an inline <scrip> tag!  Preferably the first!

ReadyJS will then spy on the following events and methods:

* window.load event
* dynamically added `<script>` tags using insertBefore or appendChild
* XMLHttpRequest.open()
* window.setTimeout()

Finally, we query ReadyJS to determine the status or number of outstanding callbacks.

API
---

ReadyJS.getVersion() - returns a string containing the semantic version

ReadyJS.getStatus() - returns an Object containing the number of outstanding callbacks, keyed by type

ReadyJS.isReady() - returns a boolean; true if ready; false otherwise

Copyright
---------

* Copyright 2014 Anthon Pang
* License: MIT

Credits
-------

* Author: Anthon Pang [robocoder](http://github.com/robocoder/)
* [Other contributors](https://github.com/vipsoft/readyjs/contributors)
