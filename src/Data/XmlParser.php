<?php


namespace Data;

class XmlParser
{
    private $xml;

    public function __construct($input)
    {
        $file = file_get_contents($input);
        $this->loadXMLfromString($file);
        return true;
    }


    public function getXMLasAssocArray($tidyUser = true)
    {
        $json = json_encode($this->xml);
        $data = json_decode($json, true);
        if ($tidyUser) {
            $data['users'] = $data['user']; //This give each item the same name!
            unset($data['user']); //Not nice!
        }

        return $data;
    }

    private function loadXMLfromString($inputXml)
    {
        //load the xml
        $this->xml = simplexml_load_string($inputXml);
    }
}
