<?php
// Symfony's front-controller (bootstrap file, whatever you want to call it) is even simpler than our modified Yii
// front-controller. Mainly because Symfony already does everything that we had to botch-job into Yii.

require_once __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . "/../app/AppKernel.php";

use Symfony\Component\HttpFoundation\Request;

// Load environmental variables into global variables.
Dotenv::load(__DIR__ . '/../');
// Determine the request that was made and create an object from it.
$request = Request::createFromGlobals();

// Create the application kernel, specifying the environment and whether we should enable debug.
$kernel = new AppKernel($_SERVER['SYMFONY_ENV'], (bool) $_SERVER['SYMFONY_DEBUG']);
// Get the application kernel to handle the request through the framework with the application controllers and return
// the response object.
$response = $kernel->handle($request);

// Send the response back to the end-user (most likely a browser client).
$response->send();
// Terminate the entire process (tidying things up, logging what happened, etc).
$kernel->terminate($request, $response);
