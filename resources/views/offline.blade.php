@inject('textos','App\Text')
@inject('albumes','App\Album')
@inject('imagenes','App\Image')

<!DOCTYPE html>
<html>
	<head>
		<title>{{ $textos->texto("titulo") }}</title>

		<link rel="stylesheet" href="{{ URL::asset('css/offline.css') }}">

	</head>

	<body>
		<div class="centrar">
			<img src="{{ $imagenes->imagen("logo")->url }}" />
			<div class="informacion">{{ $textos->texto("Informacion") }}</div>
		</div>
	</body>

</html>