<!DOCTYPE html>
<html>
<head>
	<title>{{ $textos->get('titulo')->body or 'TITULO'}}</title>

	<link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
	<link rel="manifest" href="favicon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="favicon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">

	
	<style>
		body {
			height: 100vh;
			width: 100%;
			white-space: nowrap;
			
			text-align: center;
			margin: 1em 0;
			overflow: hidden;
		}

		img {
			vertical-align: middle;
			max-height: 190px;
		}

		.centrar {
			margin: auto;
			position: absolute;
			top: 0; left: 0; bottom: 0; right: 0;
			height: 320px;
		}

		.telefonos{
			font-family: Arial, Helvetica, sans-serif;
			padding: 20px;
			font-size: 1.2em;
			color: gray;
		}

		@media screen and (max-width: 470px) {
			img {
				vertical-align: middle;
				height: 140px;
			}

		}
	</style>
</head>
<body>
	<div class="centrar">
		<img src="{{ URL::asset('')}}/{{ $imagenesBase->get('principal')->file  or 'images/no-image.jpg'}}" />
		<div class="telefonos">{{ $textos->get('telefonos')->body  or 'TELEFONOS'}}</div>
	</div>
</body>
</html>