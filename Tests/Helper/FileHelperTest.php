<?php

namespace Test\Helper;

use PHPUnit\Framework\TestCase;
use Helper\FileHelper;

class FileHelperTest extends TestCase
{
    public function testSumValuesCorrect()
    {
        $users = [
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

        $fileHelper = new FileHelper();

        $this->assertEquals($fileHelper->getValueCountFromData($users),900);
    }

    public function testSumValuesCorrectNoActive()
    {
        $users = [
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

        $fileHelper = new FileHelper();

        $this->assertEquals($fileHelper->getValueCountFromData($users),0);
    }

    public function testSumValuesCorrectRemoveActive()
    {
        $users = [
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

        $fileHelper = new FileHelper();

        $this->assertEquals($fileHelper->getValueCountFromData($users),0);
    }

    public function testSumValuesCorrectNoValue()
    {
        $users = [
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

        $fileHelper = new FileHelper();

        $this->assertEquals($fileHelper->getValueCountFromData($users),0);
    }

    public function testOutputDataNoFile()
    {
        $users = [
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

        $fileHelper = new FileHelper();

        $this->assertEquals($fileHelper->outputDataToFile($users),900);
    }

    public function testOutputDataWithFile()
    {
        $users = [
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

        $fileHelper = new FileHelper();

        $this->assertEquals($fileHelper->outputDataToFile($users,"results/test.txt"),900);
    }



}