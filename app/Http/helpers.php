<?php

function getModelo($model){
	$array = explode('\\', $model);

	return end($array);
}

function urlModelo($data){
	if($data->fieldName() == 'Borrado') return '#';

	switch (getModelo($data->revisionable_type)) {
		case 'Text': 		$ruta = 'admin.textos.show'; 			break;
		case 'TextCategory':$ruta = 'admin.textos.categorias.show'; break;
		case 'Album': 		$ruta = 'admin.albums.show'; 			break;
		case 'Gallery':		$ruta = 'admin.galerias.show'; 			break;
		case 'Image': 		$ruta = 'admin.imagenes.show'; 			break;
		default: return '#'; 
	}

	return URL::route($ruta, ['id' => $data->revisionable_id]);
	
}