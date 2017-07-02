<?php


namespace Helper;

class FileHelper
{
    /**
     * @param $data
     * @param string $fileLocation
     * @return int
     */
    public function outputDataToFile($data, $fileLocation = "")
    {
        $outputValue = $this->getValueCountFromData($data);

        if ($fileLocation) {
            //add in create dir if required.
            file_put_contents($fileLocation, $outputValue);
        }

        return $outputValue;
    }

    /**
     * @param $data
     * @return int
     */
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
