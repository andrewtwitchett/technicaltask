<?php


namespace Data;

class CsvParser
{
    private $csv;
    private $dataLoaded = false;

    public function __construct($input)
    {
        $dataLoaded = false;

        if ($input) {
            $data = ['users'];
            $combined = [];
            $rows = array_map('str_getcsv', file($input));
            $header = array_shift($rows);
            $csv = array();
            foreach ($rows as $row) {
                $combined[] = array_combine($header, $row);
            }
            $data['users'] = $combined;

            $this->csv = $data;
            $dataLoaded = true;
        }

        $this->dataLoaded = $dataLoaded;
    }

    public function getDataLoaded()
    {
        return $this->dataLoaded;
    }


    public function getCSVasAssocArray()
    {
        return $this->csv;
    }
}
