<?php

// Composer Autoloader
require_once __DIR__."/../vendor/autoload.php";

$app = new Core\Application;

// All routes
require __DIR__."/../App/Routes.php";

$app->run();
