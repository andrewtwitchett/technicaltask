<?php

namespace Helper;

class InputHelper
{
    private $input;
    private $output;
    private $error;
    private $errorMessage;

    public function __construct()
    {
        //default object
        $this->input = "";
        $this->output = "";
        $this->error = false;
        $this->errorMessage = "";
    }

    public function getInput()
    {
        return $this->input;
    }

    public function getOutput()
    {
        return $this->output;
    }

    public function getError()
    {
        return $this->error;
    }

    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    public function setInputData($argv)
    {
        $this->setInputParameters($argv);
    }


    private function setInputParameters($argv)
    {

        //run through the tests
        $count = $this->checkCountOfParams($argv);

        if ($this->error === false) {
            if ($count === 2) {
                $this->input = $argv[1];
            } else {
                $this->setOptionValue();
            }
        }
    }

    private function checkCountOfParams($argv)
    {
        if (count($argv) !== 2 && count($argv) !== 3) {
            $this->error = true;
            $this->errorMessage = "you need to pass either 2 or 3 parameters";
        }

        return count($argv);
    }

    private function setOptionValue()
    {
        $inputOptions = getopt("", array("input:","output::"));

        if (array_key_exists("input", $inputOptions)) {
            $this->input  = $inputOptions['input'];
        } else {
            $this->error = true;
            $this->errorMessage = "If you pass 2 parameters you need to ensure one is 'input'";
        }

        //note output not required!
        if (array_key_exists("output", $inputOptions)) {
            $this->output  = $inputOptions['output'];
        }
    }
}
