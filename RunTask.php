<?php

require __DIR__.'/vendor/autoload.php';

use Task\Runner\Task;
use Helper\InputHelper;


$inputHelper = new InputHelper();

$params = $inputHelper->getInputData($argv);

if ($params['error']) {
    print $params['errorMessage'];
} else {

    $input = $params["input"];
    $output = $params["output"];

    $task = new Task();

    print $task->runTask($input, $output);
}







