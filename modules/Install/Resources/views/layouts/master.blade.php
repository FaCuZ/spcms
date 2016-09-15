@extends('auth.layouts.master')

@section('content')
<body class="hold-transition login-page">
	<div class="login-box install-box">
		<div class="login-logo">
			<a href="{{ url('/') }}"><strong>Instalador</strong>Web</a>

		</div>
		

		<div class="login-box-body">

			<p class="login-box-msg">@yield('title-box')</p>
			
			@yield('content-box')
			
			<div class="pasos-box">
				<ul>
					<li @yield('paso-1')><i class="fa fa-life-ring"></i></li>
					<li @yield('paso-2')><i class="fa fa-gear"></i></li>
					<li @yield('paso-3')><i class="fa fa-database"></i></li>
					<li @yield('paso-4')><i class="fa fa-pencil"></i></li>
					<li @yield('paso-5')><i class="fa fa-user"></i></li>
				</ul>
			</div>

			<div class="linea-box">
				<ul>
					<li @yield('paso-1')></li>
					<li @yield('paso-2')></li>
					<li @yield('paso-3')></li>
					<li @yield('paso-4')></li>
					<li @yield('paso-5')></li>
				</ul>
			</div>

		</div>


	</div>


@endsection
