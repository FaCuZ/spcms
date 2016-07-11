@extends('auth.layouts.master')

@section('content')
<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<a href="{{ url('/') }}"><b>Administrador</b>Web</a>
		</div>
		
		<div class="login-box-body">
			<p class="login-box-msg">ATENCION</p>
			
			<p class="text-center">Para continuar debe contactarse con el administrador</p>

		</div>

	</div>

@endsection