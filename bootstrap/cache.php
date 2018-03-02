<?php

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