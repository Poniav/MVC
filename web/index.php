<?php

require_once __DIR__."/../vendor/autoload.php";

// error_reporting(E_ALL);
// set_error_handler('Core\Exception\Error::errorHandler');
// set_exception_handler('Core\Exception\Error::exceptionHandler');

$app = new Core\Controllers\AppController;

require __DIR__."/../App/Routes.php";

$app->run();



// echo '<pre>';
// print_r($app);
// echo '</pre>';


// echo '<pre>';
// print_r($app['route']->getRoutes());
// echo '</pre>';
// echo '<pre>';
// print_r($app['route']->getParams());
// echo '</pre>';
