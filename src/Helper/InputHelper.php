<?php

namespace Helper;


class InputHelper
{
    private $inputData;


    public function getInputData($argv) {
        $this->checkInputParameters($argv);
        return $this->inputData;
    }


    public function checkInputParameters($argv) {

        $this->inputData['input'] = "";
        $this->inputData['output'] = "";
        $this->inputData['error'] = false;
        $this->inputData['errorMessage'] = "";

        //run through the tests
        $count = $this->checkCountOfParams($argv);

        if ($this->inputData['error'] === false)
        {
            if ($count === 2) {
                $this->inputData['input'] = $argv[1];
            } else {
                $this->setOptionValue();
            }
        }
    }

    private function checkCountOfParams($argv) {

        if (count($argv) !== 2 && count($argv) !== 3 ) {
            $this->inputData['error'] = true;
            $this->inputData['errorMessage'] = "you need to pass either 2 or 3 parameters";
        }

        return count($argv);
    }

    private function setOptionValue() {

        $inputOptions = getopt("",array("input:","output::"));

        if (array_key_exists("input",$inputOptions)) {
            $this->inputData['input']  = $inputOptions['input'];
        }
        else {
            $this->inputData['error'] = true;
            $this->inputData['errorMessage'] = "If you pass 2 parameters you need to ensure one is 'input'";
        }

        //note output not required!
        if (array_key_exists("output",$inputOptions)) {
            $this->inputData['output']  = $inputOptions['output'];
        }


    }



}