@extends('auth.layouts.master')

@section('content')
<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<a href="{{ url('/') }}"><b>Administrador</b></a>
		</div>
		
		<div class="login-box-body">
			<p class="login-box-msg">AREA PROTEGIDA</p>

			<form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
				{{ csrf_field() }}

				<div class="form-group has-feedback">
					<input id="email" type="email" placeholder="Email" class="form-control" name="email" value="{{ old('email') }}">
					<span class="fa fa-envelope form-control-feedback"></span>
				</div>

				@if ($errors->has('email'))
					<span class="help-block text-red">
						<strong>{{ $errors->first('email') }}</strong>
					</span>
				@endif

				<div class="form-group has-feedback">
					<input id="password" type="password" class="form-control" placeholder="Password" name="password">

					<span class="fa fa-lock form-control-feedback"></span>
				</div>

				@if ($errors->has('password'))
					<span class="help-block text-red">
						<strong>{{ $errors->first('password') }}</strong>
					</span>
				@endif

				<div class="row">
					<div class="col-xs-6">
							<label>
								<input id="check" type="checkbox" name="remember"> Recordarme
							</label>
					</div>

					<div class="col-xs-6">
						<button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
					</div>

				</div>
			</form>

			<div class="login-box-links">
				<a href="{{ url('/register') }}">Olvide mi contraseña</a><br>
				<a href="{{ url('/password/reset') }}" class="text-center">Registrar nueva cuenta</a>
			</div>

		</div>

	</div>


@endsection