<?php

namespace Test\Data;

use PHPUnit\Framework\TestCase;
use Data\CsvParser;

class CsvParserTest extends TestCase
{
    public function testSendOnData()
    {
        $csvParser = new CsvParser("");

        $this->assertFalse($csvParser->getDataLoaded());

    }

    public function testSendCsvData()
    {
        $testString = "data/file.csv";
        $csvParser = new CsvParser($testString);

        $this->assertTrue($csvParser->getDataLoaded());

    }


}