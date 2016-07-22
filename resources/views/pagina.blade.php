<!DOCTYPE html>
<html>
	<head>
		<title>{{ $textos->get('titulo')->body or 'TITULO'}}</title>	
	</head>

	<body>
		{{-- EJEMPLOS: --}}	
				
		{{-- TEXTO --}}
		<div>{{ $textos->get('texto')->body  or 'TEXTO'}}</div>
		
		{{-- IMAGEN --}}
		<img src="{{ URL::asset('')}}/{{ $imagenesBase->get('imagen')->file  or 'images/no-image.jpg'}}" />

		{{-- GALERIA --}}
		<ul class="nav nav-tabs">
			@foreach($album->galerias as $galeria)
				<li><a href="#tab_{{ $galeria->id }}" data-toggle="tab">{{ $galeria->title }}</a></li>
			@endforeach
		</ul>
		<div class="tab-content">
			@foreach($album->galerias as $galeria)
			<div class="tab-pane" id="tab_{{ $galeria->id }}">
				@foreach($galeria->imagenes as $image)
				<span class="image_container">
					<a href="{{ route('admin.imagenes.show', $image->id) }}"><img src="{{ URL::asset($image->thumb) }}"></a>
				</span>
				@endforeach
				<div class="new_image">
					<a href="{{ route('admin.imagenes.create', ['gallery' => $galeria->id]) }}"><i class="fa fa-plus"></i></a>
				</div>


				<div class="after-box"></div>

			</div>
			@endforeach
		</div>

	</body>
</html>