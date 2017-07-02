<?php

namespace Data;

use Symfony\Component\Yaml\Yaml;

class YamlParser implements ParserInterface
{
    private $usersData;
    private $dataLoaded = false;

    /**
     * YamlParser constructor.
     * @param $input
     */
    public function __construct($input)
    {
        $dataLoaded = false;

        if ($input) {
            $data = Yaml::parse(file_get_contents($input));

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
