<?php
/**
 * Created by Andrew Twitchett.
 * User: Andre
 * Date: 01/07/2017
 * Time: 17:45
 */

namespace Task\Runner;

use Symfony\Component\Yaml\Yaml;
use Data\XmlParser;
use Data\CsvParser;
use Helper\FileHelper;
use Helper\InputHelper;

class Task
{
    public function runTask($argv)
    {
        $returnValue = "";
        $inputHelper = new InputHelper();

            //Get the input data and parse
            $inputHelper->setInputData($argv);

            // ensure there is no error. Else return error message (this could throw an exception but as we are
            // only outputting to the console it makes sense to just output a message for now )
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

                    //Decide what to do with the data that has come in
                    switch ($info->getExtension()) {
                        case "xml":
                            $xmlParser = new XmlParser($input);
                            $data = $xmlParser->getXMLasAssocArray();
                            break;
                        case "yml":
                            $data = Yaml::parse(file_get_contents($input));
                            break;
                        case "csv":
                            $csvParser = new CsvParser($input);
                            $data = $csvParser->getCSVasAssocArray();
                            break;
                    }

                    $returnValue = $fileHelper->outputDataToFile($data, $output);
                } else {
                    $returnValue = "input file not found";
                }
            }

        return $returnValue;
    }
}
