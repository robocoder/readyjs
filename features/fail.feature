@javascript
Feature:
    As a developer
    I want to see page loads and AJAX requests not fully "complete"
    In order to regression test in the absence of ready.js.

    Scenario: Load a page that contains inline script
       When I go to "http://admin/page-load-inline-script.php"
       Then I should not see "Hello"

    Scenario: Load a page that has jQuery ready() handler
       When I go to "http://admin/page-load-ajax-jquery.php"
       Then I should not see "Hello"

    Scenario: Load a page that has DOMContentLoaded handler
       When I go to "http://admin/page-load-ajax-native.php"
       Then I should not see "Hello"

    Scenario: Load a page that async loads JavaScript via appendChild()
       When I go to "http://admin/page-load-appendchild-script.php"
       Then I should not see "Hello"

    Scenario: Load a page that async loads JavaScript via insertBefore()
       When I go to "http://admin/page-load-insertbefore-script.php"
       Then I should not see "Hello"

    Scenario: Load a page that async loads dummy JavaScript with onload callback; script is in <head>
       When I go to "http://admin/page-load-head-script.php"
       Then I should not see "Hello"

    Scenario: Load a page that async loads dummy JavaScript with onload callback; script is in <body>
       When I go to "http://admin/page-load-body-script.php"
       Then I should not see "Hello"

    Scenario: Load a page that has setTimeout callbacks
       When I go to "http://admin/page-load-set-timeout.php"
       Then I should not see "Hello"

    Scenario: Click a button that makes jQuery AJAX calls
       When I go to "http://admin/page-interaction-ajax-jquery.php"
       And I press "Load"
       Then I should not see "Hello"

    Scenario: Click a button that makes native AJAX calls
       When I go to "http://admin/page-interaction-ajax-native.php"
       And I press "Load"
       Then I should not see "Hello"
