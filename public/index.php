<?php

/**
 * Php lite framework
 *
 * @author Ayman Elmalah aymanelmalah77@gmail.com
 */

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Load autoloader file that will automatically generated class loader for the application
*/
require __DIR__.'/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Bootstrap
|--------------------------------------------------------------------------
|
| Bootstrap the application and do the framework actions
*/
require_once __DIR__.'/../bootstrap/app.php';

/*
|--------------------------------------------------------------------------
| Run the application
|--------------------------------------------------------------------------
|
| Handle the requests and send response with preparing all functions required
*/
$app = Application::run();