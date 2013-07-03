<?php
use Behat\MinkExtension\Context\MinkContext;
use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;

//
// Require 3rd-party libraries here:
//
//   require_once 'PHPUnit/Autoload.php';
//   require_once 'PHPUnit/Framework/Assert/Functions.php';
//

/**
 * Features context.
 */
class FeatureContext extends MinkContext
{
    /**
     * Initializes context.
     * Every scenario gets it's own context object.
     *
     * @param array $parameters context parameters (set them up through behat.yml)
     */
    public function __construct(array $parameters)
    {
        // Initialize your context here
    }

/**
* @Given /^I fill in "([^"]*)" with the date "([^"]*)" days? from today$/
*/
public function iFillInWithTheDateDaysFromToday($field, $days)
{
    $currentDate = new DateTime("now", new DateTimeZone('AMERICA/New_York'));
    $relativeDate = $currentDate->add(new DateInterval("P".$days."D"));
    $this->getSession()->getPage()->fillField($field, $relativeDate->format('Y-m-d'));
}

}
