@extends('auth.layouts.master')

@section('content')
<body class="hold-transition register-page">
	<div class="register-box">
		<div class="register-logo">
			<a href="{{ url('/') }}"><b>Administrador</b>Web</a>
		</div>

		<div class="register-box-body">
			<p class="login-box-msg">NUEVA CUENTA</p>

			<form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
				{{ csrf_field() }}
				<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} has-feedback">
					<input id="name" type="text" class="form-control" name="name" placeholder="Nombre completo" value="{{ old('name') }}">
					<span class="fa fa-user form-control-feedback"></span>

					@if ($errors->has('name'))
						<span class="help-block">
							<strong>{{ $errors->first('name') }}</strong>
						</span>
					@endif

				</div>
				<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
					<input id="email" type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
					<span class="fa fa-envelope form-control-feedback"></span>

					@if ($errors->has('email'))
						<span class="help-block">
							<strong>{{ $errors->first('email') }}</strong>
						</span>
					@endif

				</div>
				<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
					<input id="password" type="password" class="form-control" name="password" placeholder="Contraseña">
					<span class="fa fa-lock form-control-feedback"></span>

					@if ($errors->has('password'))
						<span class="help-block">
							<strong>{{ $errors->first('password') }}</strong>
						</span>
					@endif

				</div>
				<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }} has-feedback">
					<input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Repetir contraseña">
					<span class="fa fa-lock form-control-feedback"></span>

					@if ($errors->has('password_confirmation'))
						<span class="help-block">
							<strong>{{ $errors->first('password_confirmation') }}</strong>
						</span>
					@endif

				</div>
				<div class="row">
{{-- 					
						<div class="col-xs-6">
						<div class="checkbox icheck">
							<label>
								<input type="checkbox"> Estoy de acuerdo con los <a href="#">terminos</a>
							</label>
						</div>
					</div> --}}
					<!-- /.col -->
					<div class="col-xs-10 col-xs-offset-1">
						<button type="submit" class="btn btn-primary btn-block btn-flat">Registrar</button>
					</div>
				</div>
			</form>

			<div class="login-box-links">
				<a href="{{ url('/login') }}" class="text-center">Ya tengo cuenta</a>
		
			</div>
		</div>
	</div>

@endsection
