<?php

namespace Test\Helper;

use PHPUnit\Framework\TestCase;
use Helper\FileHelper;
use Data\User;

class FileHelperTest extends TestCase
{
    public function testSumValuesCorrect()
    {
        $usersArray = [
             "users" => [
                [
                    "name" => "John",
                    "active" => "true",
                    "value" => "500"
                ],
                [
                    "name" => "Mark",
                    "active" => "true",
                    "value" => "250"
                ],
                [
                    "name" => "Paul",
                    "active" => "false",
                    "value" => "100"
                ],
                [
                    "name" => "Ben",
                    "active" => "true",
                    "value" => "150"
                ]
             ]
         ];

        foreach ($usersArray['users'] as $user) {
            $user = new User($user['name'], $user['active'], $user['value']);
            $users[] = $user;
        }

        $fileHelper = new FileHelper();

        $this->assertEquals($fileHelper->getValueCountFromData($users),900);
    }

    public function testSumValuesCorrectNoActive()
    {
        $usersArray = [
            "users" => [
                [
                    "name" => "John",
                    "active" => "false",
                    "value" => "500"
                ],
                [
                    "name" => "Mark",
                    "active" => "false",
                    "value" => "250"
                ],
                [
                    "name" => "Paul",
                    "active" => "false",
                    "value" => "100"
                ],
                [
                    "name" => "Ben",
                    "active" => "false",
                    "value" => "150"
                ]
            ]
        ];


        foreach ($usersArray['users'] as $user) {
            $user = new User($user['name'], $user['active'], $user['value']);
            $users[] = $user;
        }

        $fileHelper = new FileHelper();

        $this->assertEquals($fileHelper->getValueCountFromData($users),0);
    }

    public function testSumValuesCorrectRemoveActive()
    {
        $usersArray = [
            "users" => [
                [
                    "name" => "John",
                    "value" => "500"
                ],
                [
                    "name" => "Mark",
                    "value" => "250"
                ],
                [
                    "name" => "Paul",
                    "value" => "100"
                ],
                [
                    "name" => "Ben",
                    "value" => "150"
                ]
            ]
        ];

        foreach ($usersArray['users'] as $user) {
            $user = new User($user['name'], "", $user['value']);
            $users[] = $user;
        }

        $fileHelper = new FileHelper();

        $this->assertEquals($fileHelper->getValueCountFromData($users),0);
    }

    public function testSumValuesCorrectNoValue()
    {
        $usersArray = [
            "users" => [
                [
                    "name" => "John",
                    "active" => "true"
                ],
                [
                    "name" => "Mark",
                    "active" => "true"
                ],
                [
                    "name" => "Paul",
                    "active" => "true"
                ],
                [
                    "name" => "Ben",
                    "active" => "false"
                ]
            ]
        ];

        foreach ($usersArray['users'] as $user) {
            $user = new User($user['name'], $user['active'], "");
            $users[] = $user;
        }

        $fileHelper = new FileHelper();

        $this->assertEquals($fileHelper->getValueCountFromData($users),0);
    }

    public function testOutputDataNoFile()
    {
        $usersArray = [
            "users" => [
                [
                    "name" => "John",
                    "active" => "true",
                    "value" => "500"
                ],
                [
                    "name" => "Mark",
                    "active" => "true",
                    "value" => "250"
                ],
                [
                    "name" => "Paul",
                    "active" => "false",
                    "value" => "100"
                ],
                [
                    "name" => "Ben",
                    "active" => "true",
                    "value" => "150"
                ]
            ]
        ];

        foreach ($usersArray['users'] as $user) {
            $user = new User($user['name'], $user['active'], $user['value']);
            $users[] = $user;
        }

        $fileHelper = new FileHelper();

        $this->assertEquals($fileHelper->outputDataToFile($users),900);
    }

    public function testOutputDataWithFile()
    {
        $usersArray = [
            "users" => [
                [
                    "name" => "John",
                    "active" => "true",
                    "value" => "500"
                ],
                [
                    "name" => "Mark",
                    "active" => "true",
                    "value" => "250"
                ],
                [
                    "name" => "Paul",
                    "active" => "false",
                    "value" => "100"
                ],
                [
                    "name" => "Ben",
                    "active" => "true",
                    "value" => "150"
                ]
            ]
        ];

        foreach ($usersArray['users'] as $user) {
            $user = new User($user['name'], $user['active'], $user['value']);
            $users[] = $user;
        }

        $fileHelper = new FileHelper();

        $this->assertEquals($fileHelper->outputDataToFile($users,"results/test.txt"),900);
    }



}