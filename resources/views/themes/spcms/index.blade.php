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

		@include('themes.spcms.layouts.styles')

	</head>

	<body>

		<header> @include('themes.spcms.layouts.header')	</header>

		{{-- EJEMPLOS: --}}	
		<h4>Imagen:</h4>
		<img src="{{ $albumes->imagen("diseño", "logos", "logo")->url }}" />

		<h4>Imagen no encontrada:</h4>
		<img src="{{ $imagenes->imagen("no encontrada")->url }}" />
				
		<h4>Texto:</h4>
		<div>{{ $textos->texto("corto") }}</div>		

		<h4>Texto desde categorias:</h4>
		<div>{{ $categorias->texto("diseño","largo") }}</div>		

		<h4>Solo una galeria:</h4>
		@if(($album = $albumes->album('diseño')) !== 'null')
			@foreach($album->galerias as $galeria)
				<img src="{{ $galeria->vista }}"></a>
			@endforeach
		@endif
		
		<h4>Galeria: </h4>
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
		<footer> @include('themes.spcms.layouts.footer')	</footer>

		{{-- NOTA: Este js esta para probar la galeria de imagenes --}}
		<script src="{{ URL::asset('js/admin-libs.js') }}"></script>

	</body>
</html>