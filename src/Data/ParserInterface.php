<?php

namespace Data;

interface ParserInterface
{
    public function __construct($input);
    public function getDataLoaded();
    public function getUsers();
}
