<?php

use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Task\Runner\Task;

class FeatureContext implements SnippetAcceptingContext
{
    /**
     * Initializes context.
     */

    private $task;
    private $inputdata;

    public function __construct()
    {
        $this->task = new Task();
    }

    /**
     * @Given $argv has only one parameter
     */
    public function argvHasOnlyOneParameter()
    {
        $this->inputdata[] = "filename";
    }

    /**
     * @Then a message should be displayed :arg1
     */
    public function aMessageShouldBeDisplayed($arg1)
    {
        $result = $this->task->runTask($this->inputdata);
        PHPUnit_Framework_Assert::assertEquals($arg1, $result);

    }

    /**
     * @Given $argv has :arg2 parameters the second of which is :arg1
     */
    public function argvHasParametersTheSecondOfWhichIs($arg1, $arg2)
    {
        $this->inputdata = ["runtask.php", "data/file.csv"];

    }

    /**
     * @Then a value message should be displayed :arg1
     */
    public function aVAlueMessageShouldBeDisplayed($arg1)
    {
        $result = $this->task->runTask($this->inputdata);
        PHPUnit_Framework_Assert::assertEquals($arg1, $result);

    }


}