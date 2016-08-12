<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Administrador</title>
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

		@include('admin::layouts.styles')

	</head>

	<body class="hold-transition skin-blue sidebar-mini">
		<div class="wrapper">

			<header class="main-header">

				@include('admin::layouts.header')

			</header>

			<aside class="main-sidebar">

				<section class="sidebar">

					@include('admin::layouts.sidebar')	

				</section>

			</aside>

		  	<div class="content-wrapper">
			
				<section class="content-info">		

					@include('admin::layouts.alerts')

				</section>
				
				<section class="content-header">

					@yield('header')

    			</section>

			    <section class="content">

					@yield('content')

				</section>

		  	</div>
{{-- 
			<footer class="main-footer">

				@include('admin::layouts.footer')

			</footer>
 --}}
		</div>

		<script src="{{ URL::asset('js/admin-libs.js') }}"></script>

	</body>
</html>