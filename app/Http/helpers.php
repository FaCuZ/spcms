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

	try {
		return URL::route($ruta, ['id' => $data->revisionable_id]);
	} catch (Exception $e) {
		return '#';	
	}
	
}

function sinImagen(){
	$imagen = Modules\Images\Models\Image::get()->keyBy('title')->get('sin imagen');

	if(!$imagen) {
		$imagen = new Modules\Images\Models\Image();
		$imagen->file = 'images/sin-imagen.jpg';
		$imagen->thumb = 'images/sin-imagen-thumb.jpg';
	}

	return $imagen;
}

function clearCache(){
	try {
		$directorios = File::directories(base_path('bootstrap/cache'));
		foreach ($directorios as $folder) {
			rrmdir($folder);
		}
		
	} catch (Exception $e) {
		dd($e);
	}
}


function rrmdir($dir) {
	if (is_dir($dir)) {
		$objects = scandir($dir);
		foreach ($objects as $object) {
			if ($object != "." && $object != "..") {
				if (filetype($dir."/".$object) == "dir"){
					rrmdir($dir."/".$object);
				}else{ 
					unlink($dir."/".$object);
				}
			}
		}
		reset($objects);
		rmdir($dir);
	}
}

function cacheStatus(){
	return file_exists(base_path('bootstrap/cache/CACHE'));
}


function showTable($tabla, $data){
	$html = '';
	if(!empty($tabla)){
		$html .=  '<table class="tabla_ejemplo">';
		$html .= '<tr>';
		foreach($tabla as $col){
			$html .= '<th>'.$col.'</th>';
		}
		$html .= '</tr><tr>';

		foreach($tabla as $col){
			$html .= '<td>'.$data[$col].'</td>';
		}
							
		$html .= '</tr></table>';
	}
	return $html;
}