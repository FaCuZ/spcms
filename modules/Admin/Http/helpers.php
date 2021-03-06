<?php

function getModelo($model){
	$array = explode('\\', $model);

	return end($array);
}

function urlModelo($data){
	if($data->fieldName() == 'Borrado') return '#';

	switch (getModelo($data->revisionable_type)) {
		case 'Link': 		$ruta = 'admin.links.show'; 			break;
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

function button($boton){
	return '<a class="btn btn-default btn-xs" href="'.getUrlButton($boton).'"><i class="fa fa-chevron-left"></i></a>';
}

function getUrlButton($op){
	switch ($op) {
		case 'back': 	return URL::previous();
		case 'images': 	return route('admin.imagenes.index');
		case 'texts': 	return route('admin.textos.index');
		case 'links': 	return route('admin.links.index');
		case 'news': 	return route('admin.noticias.index');
		case 'faq': 	return route('admin.faq.index');

		default: return route($boton);
	}
}


function imageThumbSize($image, $size) {

	$file = pathinfo($image->file);

	$imageSize = $file['dirname'].'/'.$file['filename'].'-thumb_'.$size.'.'.$file['extension'];

    if (!file_exists($imageSize)) {

		$imageFile = ImageI::make($image->file);

		$vector = explode("x", $size);

		$imageFile->fit($vector[0], $vector[1]);
		
		$imageFile->save($imageSize);
    }

    return $imageSize;
}