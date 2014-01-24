@javascript
Feature:
    As a developer
    I want page loads and AJAX requests to fully "complete"
    In order to avoid an abundance of "waits" or "wait untils" in my feature files and/or steps.

    # This scenario is handled by Selenium/WebDriver.
    Scenario: Load a page that takes long time to load
       When I visit "http://admin/page-load-wait.php"
       Then I should see "Hello"

    Scenario: Load a page that contains inline script
       When I visit "http://admin/page-load-inline-script.php"
       Then I should see "Hello"

    Scenario: Load a page that has jQuery ready() handler
       When I visit "http://admin/page-load-ajax-jquery.php"
       Then I should see "Hello"

    Scenario: Load a page that has DOMContentLoaded handler
       When I visit "http://admin/page-load-ajax-native.php"
       Then I should see "Hello"

    Scenario: Load a page that async loads JavaScript via appendChild()
       When I visit "http://admin/page-load-appendchild-script.php"
       Then I should see "Hello"

    Scenario: Load a page that async loads JavaScript via insertBefore()
       When I visit "http://admin/page-load-insertbefore-script.php"
       Then I should see "Hello"

    Scenario: Load a page that async loads dummy JavaScript with onload callback; script is in <head>
       When I visit "http://admin/page-load-head-script.php"
       Then I should see "Hello"

    Scenario: Load a page that async loads dummy JavaScript with onload callback; script is in <body>
       When I visit "http://admin/page-load-body-script.php"
       Then I should see "Hello"

    Scenario: Load a page that has setTimeout callbacks
       When I visit "http://admin/page-load-set-timeout.php"
       Then I should see "Hello"

    Scenario: Click a button that makes jQuery AJAX calls
       When I visit "http://admin/page-interaction-ajax-jquery.php"
       And I push "Load"
       Then I should see "Hello"

    Scenario: Click a button that makes native AJAX calls
       When I visit "http://admin/page-interaction-ajax-native.php"
       And I push "Load"
       Then I should see "Hello"
