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
        public function runTask($argv) {

            $returnValue = "";
            $inputHelper = new InputHelper();

            $params = $inputHelper->getInputData($argv);

            if ($params['error']) {
                $returnValue = $params['errorMessage'];
            } else {

                $input = $params["input"];
                $output = $params["output"];

                if (file_exists($input)) {

                    $data = "";
                    $info = new \SplFileInfo($input);
                    $fileHelper = new FileHelper();

                    switch ($info->getExtension()) {
                        case "xml" :
                            $xmlParser = new XmlParser($input);
                            $data = $xmlParser->getXMLasAssocArray();
                            break;
                        case "yml" :
                            $data = Yaml::parse(file_get_contents($input));
                            break;
                        case "csv" :
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