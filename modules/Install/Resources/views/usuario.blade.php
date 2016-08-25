
@extends('install::layouts.master')

@section('title-box')
	CUENTA DE ADMINISTRADOR
@endsection

@section('content-box')

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
					<button type="submit" class="btn btn-primary btn-block btn-flat">Terminar</button>
				</div>
			</form>
	
@endsection


			