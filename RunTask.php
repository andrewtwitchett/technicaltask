<?php

require __DIR__.'/vendor/autoload.php';

use Task\Runner\Task;

// Main access point fo the task.
if (php_sapi_name() === 'cli') {
    $task = new Task();

    print $task->runTask($argv);
} else {
    print "this application can only be rum via the CLI";
}

