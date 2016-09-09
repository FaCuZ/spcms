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
ble

	</body>
</html>