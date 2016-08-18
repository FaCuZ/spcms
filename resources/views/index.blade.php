@inject('textos',	 'Modules\Texts\Models\Text')
@inject('categorias','Modules\Texts\Models\TextCategory')
@inject('albumes',	 'Modules\Images\Models\Album')
@inject('imagenes',	 'Modules\Images\Models\Image')

<!DOCTYPE html>
<html>
	<head>

		<title>{{ $textos->texto("titulo") }}</title>	

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

		@include('layouts.styles')

	</head>

	<body>

		<header> @include('layouts.header')	</header>

		{{-- EJEMPLOS: --}}	
		{{-- IMAGEN --}}
		<img src="{{ $imagenes->imagen("logo")->url }}" />

		{{-- IMAGEN NO ENCONTRADA--}}
		<img src="{{ $imagenes->imagen("no encontra")->url }}" />
				
		{{-- TEXTO --}}
		<div>{{ $textos->texto("largo") }}</div>		

		{{-- CATEGORIAS --}}
		<div>{{ $categorias->texto("diseño","largo") }}</div>		


		{{-- GALERIA --}}
		@if(($album = $albumes->album('diseño')) !== 'null')
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
								<a href="#"><img src="{{ URL::asset($image->thumb) }}"></a>
							</span>
						@endforeach

						<div class="after-box"></div>

					</div>
				@endforeach
			</div>
		@endif

		<br/>
		<footer> @include('layouts.footer')	</footer>

		<script src="{{ URL::asset('js/admin-libs.js') }}"></script>

	</body>
</html>