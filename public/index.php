
<?php

if ($_SERVER['HTTP_HOST'] == "ipowertel.com.ng" || $_SERVER['HTTP_HOST'] == "www.ipowertel.com.ng") {
$u = str_replace('/newstractor', '', $_SERVER['REQUEST_URI']);
header('Location: https://www.newstractor.com.ng'.$u);
}

if ($_SERVER['HTTP_HOST'] == "newstractor.ipowertel.com.ng" || $_SERVER['HTTP_HOST'] == "www.newstractor.ipowertel.com.ng" || $_SERVER['HTTP_HOST'] == "newstractor.com.ng") {
$u = $_SERVER['REQUEST_URI'];
header('Location: https://www.newstractor.com.ng'.$u);
}


/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our application. We just need to utilize it! We'll simply require it
| into the script here so that we don't have to worry about manual
| loading any of our classes later on. It feels great to relax.
|
*/

require __DIR__.'/../../newstractor/vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Turn On The Lights
|--------------------------------------------------------------------------
|
| We need to illuminate PHP development, so let us turn on the lights.
| This bootstraps the framework and gets it ready for use, then it
| will load up this application so that we can run it and send
| the responses back to the browser and delight our users.
|
*/

$app = require_once __DIR__.'/../../newstractor/bootstrap/app.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request
| through the kernel, and send the associated response back to
| the client's browser allowing them to enjoy the creative
| and wonderful application we have prepared for them.
|
*/

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);
