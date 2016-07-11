@extends('auth.layouts.master')

@section('content')
<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<a href="{{ url('/') }}"><b>Administrador</b>Web</a>
		</div>
		
		<div class="login-box-body">
			<p class="login-box-msg">RESTABLECER</p>

			<form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
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

				<div class="row">
					<div class="col-xs-10 col-xs-offset-1">
						<button type="submit" class="btn btn-primary btn-block btn-flat"><i class="fa fa-btn fa-envelope"></i> Restablecer contraseña</button>
					</div>

				</div>
			</form>

		</div>

	</div>



{{-- 
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Restablecer contraseña</div>
				<div class="panel-body">
					@if (session('status'))
					<div class="alert alert-success">
						{{ session('status') }}
					</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
						{{ csrf_field() }}

						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
							<label for="email" class="col-md-4 control-label">E-Mail Address</label>

							<div class="col-md-6">
								<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

								@if ($errors->has('email'))
								<span class="help-block">
									<strong>{{ $errors->first('email') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									<i class="fa fa-btn fa-envelope"></i> Send Password Reset Link
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div> --}}
@endsection
