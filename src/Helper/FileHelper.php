<?php


namespace Helper;

class FileHelper
{
    public function outputDataToFile($data, $fileLocation = "")
    {
        $outputValue = $this->getValueCountFromData($data);

        if ($fileLocation) {
            //add in create dir if required.
            file_put_contents($fileLocation, $outputValue);
        }

        return $outputValue;
    }

    public function getValueCountFromData($data)
    {
        $returnValue = 0;

        foreach ($data as $user) {
            if ($user->getActive() === true) {
                $returnValue = $returnValue + $user->getValue();
            }
        }
        return $returnValue;
    }
}
