<?php

// Check if the request is for a static file that exists
if (php_sapi_name() === 'cli-server' && is_file(__DIR__ . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH))) {
    return false;
}

// Define the application root directory
define('LARAVEL_START', microtime(true));

// Register the Composer auto loader
require __DIR__ . '/vendor/autoload.php';

// Turn on error reporting for development (you can adjust based on environment)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Bootstrap the Laravel application
$app = require_once __DIR__ . '/bootstrap/app.php';

// Run the Laravel application
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);
