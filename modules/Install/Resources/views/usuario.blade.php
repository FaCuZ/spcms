
@extends('install::layouts.master')

@section('title-box')
	CUENTA DE ADMINISTRADOR
@endsection

@section('content-box')

			<form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
				{{ csrf_field() }}

				<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
				
					<label for="fm-app-env" class="col-sm-2 control-label text-right">Email</label>

					<div class="col-sm-10">

						<input id="email" type="email" placeholder="admin@ejemplo.com" class="form-control" name="email" value="{{ old('email') }}">
						<span class="fa fa-envelope form-control-feedback"></span>
					</div>		

				</div>

				@if ($errors->has('email'))
					<span class="help-block text-red">
						<strong>{{ $errors->first('email') }}</strong>
					</span>
				@endif

				<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">					
				
					<label for="fm-app-env" class="col-sm-2 control-label text-right">Password</label>

					<div class="col-sm-10">
						<input id="password" type="password" class="form-control" placeholder="***" name="password">
						<span class="fa fa-lock form-control-feedback"></span>
					</div>
				</div>

				@if ($errors->has('password'))
					<span class="help-block text-red">
						<strong>{{ $errors->first('password') }}</strong>
					</span>
				@endif

				<div class="row">
					<div class="col-md-6">
						<a href="{{ route('install.basededatos') }}" class="btn btn-default btn-block btn-flat">Volver</a>
					</div>
					<div class="col-md-6">
						<button type="submit" class="btn btn-primary btn-block btn-flat">Terminar</button>
					</div>
				
				</div>
			</form>
	
@endsection



@section('paso-1')
	class="alert-success"
@endsection

@section('paso-2')
	class="alert-success"
@endsection

@section('paso-3')
	class="alert-success"
@endsection

@section('paso-4')
	class="alert-success"
@endsection

@section('paso-5')
	class="alert-warning"
@endsection