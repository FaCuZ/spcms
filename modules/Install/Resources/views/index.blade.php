@extends('auth.layouts.master')

@section('content')
<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<a href="{{ url('/') }}"><strong>Instalador</strong>Web</a>

		</div>
		

		<div class="login-box-body">

			<p class="login-box-msg">CUENTA DE ADMINISTRADOR</p>

			<form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
				{{ csrf_field() }}

				<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
					<input id="email" type="email" placeholder="Email" class="form-control" name="email" value="{{ old('email') }}">
					<span class="fa fa-envelope form-control-feedback"></span>
				</div>

				@if ($errors->has('email'))
					<span class="help-block text-red">
						<strong>{{ $errors->first('email') }}</strong>
					</span>
				@endif

				<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
					<input id="password" type="password" class="form-control" placeholder="Password" name="password">

					<span class="fa fa-lock form-control-feedback"></span>
				</div>

				@if ($errors->has('password'))
					<span class="help-block text-red">
						<strong>{{ $errors->first('password') }}</strong>
					</span>
				@endif

				<div class="row">
						<button type="submit" class="btn btn-primary btn-block btn-flat">Siguente</button>
					</div>

				</div>
			</form>
			
			<div class="pasos-box">
				<ul>
					<li><i class="fa fa-life-ring"></i></li>
					<li><i class="fa fa-gear"></i></li>
					<li><i class="fa fa-pencil"></i></li>
					<li><i class="fa fa-database"></i></li>
					<li><i class="fa fa-user"></i></li>
				</ul>
			</div>

			<div class="linea-box">
				<ul>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
				</ul>
			</div>

		</div>


	</div>


@endsection