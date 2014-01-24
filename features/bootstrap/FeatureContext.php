<?php

use Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;

class FeatureContext extends MinkContext
{
    private $maximized = false;

    /**
     * Opens specified page and wait until ready.
     *
     * @Given /^(?:|I )visit "(?P<page>[^"]+)"$/
     */
    public function visitReady($page)
    {
        $this->getSession()->visit($this->locatePath($page));
        $this->waitUntilReady();

        if ( ! $this->maximized) {
            $this->maximized = true;
            $this->getSession()->getDriver()->getWebDriverSession()->window('current')->maximize();
        }
    }

    /**
     * Presses button with specified id|name|title|alt|value.
     *
     * @When /^(?:|I )push "(?P<button>(?:[^"]|\\")*)"$/
     */
    public function pushButtonReady($button)
    {
        $button = $this->fixStepArgument($button);
        $this->getSession()->getPage()->pressButton($button);
        $this->waitUntilReady();
    }

    /**
     * Wait until "ready"
     */
    private function waitUntilReady()
    {
        $this->getSession()->getDriver()->wait(
            30000,
<<<END_OF_JS
            typeof Selenium2Helper !== 'object' || Selenium2Helper.isReady()
END_OF_JS
        );
    }
}
