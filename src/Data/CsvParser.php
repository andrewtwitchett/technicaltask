<?php


namespace Data;

class CsvParser
{

    private $csv;

    public function __construct($input)
    {
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

        return true;
    }


    public function getCSVasAssocArray() {

        return $this->csv;
    }

}