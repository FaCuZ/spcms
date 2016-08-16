<?php

function limpiarModelo($model){
	$array = explode('\\', $model);

	return end($array);
}

function urlModelo($model, $id){
	return URL::route('admin.inicio');
}