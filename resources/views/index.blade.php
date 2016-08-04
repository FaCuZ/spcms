@inject('textos','App\Text')
@inject('categorias','App\TextCategory')
@inject('albumes','App\Album')
@inject('imagenes','App\Image')

<!DOCTYPE html>
<html>
	<head>

		<title>{{ $textos->texto("titulo") }}</title>	

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

		@include('admin.layouts.styles')

	</head>

	<body>

		<header> @include('layouts.header')	</header>

		{{-- EJEMPLOS: --}}	
		{{-- IMAGEN --}}
		<img src="{{ $imagenes->imagen("logo")->url }}" />
				
		{{-- TEXTO --}}
		<div>{{ $textos->texto("Largo") }}</div>		

		{{-- CATEGORIAS --}}
		<div>{{ $categorias->texto("Diseño","Largo") }}</div>		


		{{-- GALERIA --}}
		@if(($album = $albumes->album('Diseño')) !== 'null')
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