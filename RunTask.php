<?php

require __DIR__.'/vendor/autoload.php';

use Task\Runner\Task;

$task = new Task();

print $task->runTask($argv);

