<?php


namespace Data;

class XmlParser implements ParserInterface
{
    private $usersData;
    private $dataLoaded = false;

    public function __construct($input)
    {
        $file = file_get_contents($input);
        $this->loadXMLfromString($file);
        return true;
    }

    public function getDataLoaded()
    {
        return $this->dataLoaded;
    }

    public function getUsers()
    {
        return $this->usersData;
    }

    private function loadXMLfromString($inputXml)
    {
        //load the xml
        $xml = simplexml_load_string($inputXml);
        $json = json_encode($xml);
        $xmlArray = json_decode($json, true);

        foreach ($xmlArray['user'] as $user) {
            $user = new User($user['name'], $user['active'], $user['value']);
            $this->usersData[] = $user;
        }

        $this->dataLoaded = true;
    }
}
