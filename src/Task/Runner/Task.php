<?php
/**
 * Created by Andrew Twitchett.
 * User: Andre
 * Date: 01/07/2017
 * Time: 17:45
 */

namespace Task\Runner;

use Data\XmlParser;
use Data\CsvParser;
use Data\YamlParser;
use Helper\FileHelper;
use Helper\InputHelper;

class Task
{
    /**
     * @param $argv
     * @return int|string
     */
    public function runTask($argv)
    {
        $returnValue = "";
        $inputHelper = new InputHelper();

            //Get the input data and parse
            $inputHelper->setInputData($argv);

            // ensure there is no error. Else return error message (this could throw an exception in a future release )
            if ($inputHelper->getError()) {
                $returnValue = $inputHelper->getErrorMessage();
            } else {
                $input = $inputHelper->getInput();
                $output = $inputHelper->getOutput();

                if (file_exists($input)) {

                    // data is currently just an array but it could be an object.
                    $data = [];
                    $info = new \SplFileInfo($input);
                    $fileHelper = new FileHelper();

                    $parser = "";
                    //Decide what to do with the data that has come in
                    switch ($info->getExtension()) {
                        case "xml":
                            $parser = new XmlParser($input);
                            break;
                        case "yml":
                            $parser = new YamlParser($input);
                            break;
                        case "csv":
                            $parser = new CsvParser($input);
                            break;
                    }

                    //if the data is loaded get the users and output data to a file.
                    if ($parser->getDataLoaded()) {
                        $data = $parser->getUsers();
                        $returnValue = $fileHelper->outputDataToFile($data, $output);
                    } else {
                        $returnValue = "Unable to load data";
                    }
                } else {
                    $returnValue = "input file not found";
                }
            }

        return $returnValue;
    }
}
