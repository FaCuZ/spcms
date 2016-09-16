<?php

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Register The Composer Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader
| for our application. We just need to utilize it! We'll require it
| into the script here so that we do not have to worry about the
| loading of any our classes "manually". Feels great to relax.
|
*/

require __DIR__.'/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Page Cache / mmamedov
|--------------------------------------------------------------------------
|
| Vendor package. Crea un cache para todos los GETs que no esten en 
| el array $except, solo cuando el archivos CACHE existe.
|
*/

if(file_exists(__DIR__.'/cache/CACHE') and isset($_SERVER['REQUEST_METHOD']) and $_SERVER['REQUEST_METHOD']=='GET'){

	$except = ['admin', 'login', 'logout', 'password', 'register', '_debugbar'];
	
	$requestUri = explode("/", $_SERVER['REQUEST_URI']);

	$use_cache = true;

	foreach ($except as $value) {
		if (in_array($value, $requestUri)){
			$use_cache = false;
			break;
		}
	}

	if($use_cache){
		$cache = new PageCache\PageCache(__DIR__.'/page-cache-conf.php');
		$cache->init();
	}

}

/*
|--------------------------------------------------------------------------
| Include The Compiled Class File
|--------------------------------------------------------------------------
|
| To dramatically increase your application's performance, you may use a
| compiled class file which contains all of the classes commonly used
| by a request. The Artisan "optimize" is used to create this file.
|
*/

$compiledPath = __DIR__.'/cache/compiled.php';

if (file_exists($compiledPath)) {
    require $compiledPath;
}
