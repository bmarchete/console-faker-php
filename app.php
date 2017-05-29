<?php
// application.php

require __DIR__.'/vendor/autoload.php';

use Symfony\Component\Console\Application;
use App\Command\PopulateDatabaseCommand;
use App\Command\ShowTableData;


$application = new Application();

$application->add(new PopulateDatabaseCommand());
$application->add(new ShowTableData());

$application->run();

