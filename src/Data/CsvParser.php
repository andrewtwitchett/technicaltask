<?php


namespace Data;

class CsvParser implements ParserInterface
{
    private $usersData;
    private $dataLoaded = false;

    /**
     * CsvParser constructor.
     * @param $input
     */
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

            foreach ($data['users'] as $user) {
                $user = new User($user['name'], $user['active'], $user['value']);
                $this->usersData[] = $user;
            }
            $dataLoaded = true;
        }

        $this->dataLoaded = $dataLoaded;
    }

    /**
     * @return bool
     */
    public function getDataLoaded()
    {
        return $this->dataLoaded;
    }

    /**
     * @return mixed
     */
    public function getUsers()
    {
        return $this->usersData;
    }
}
