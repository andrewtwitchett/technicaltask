<?php


namespace Helper;


class FileHelper
{
    public function outputDataToFile($data, $fileLocation)
    {
        $outputValue = $this->getValueCountFromData($data);

        if ($fileLocation) {
            //add in create dir if required.
            file_put_contents($fileLocation, $outputValue);
        }

        return $outputValue;
    }

    private function getValueCountFromData($data) {

        $returnValue = 0;

        foreach ($data['users'] as $item) {

            if ($item['active'] === "true" || $item['active'] === true) {
                $returnValue = $returnValue + $item['value'];
            }
        }

        return $returnValue;


    }

}