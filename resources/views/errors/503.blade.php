@inject('categorias','Modules\Texts\Models\TextCategory')
@inject('albumes',   'Modules\Images\Models\Album')

<!DOCTYPE html>
<html>
	<head>
		<title>{{ $categorias->texto('diseño','titulo') }}</title>

		<link rel="stylesheet" href="{{ URL::asset('css/offline.css') }}">

	</head>

	<body>
		<div class="centrar">
			<img src="{{ $albumes->imagen('diseño', 'logos', 'logo')->url }}" />
			<div class="informacion">{{ $categorias->texto('diseño','mantenimiento') }}</div>
		</div>
	</body>
</html>