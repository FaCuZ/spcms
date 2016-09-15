@extends('install::layouts.master')

@section('title-box')
	ENTORNO
@endsection

@section('content-box')

	<form class="form-horizontal text-left" method="POST" action="{{ URL::route('install.entorno.store') }}">
		{{ csrf_field() }}

		<div class="form-group">
			<label for="fm-app-env" class="col-sm-2 control-label text-right">Entorno</label>

			<div class="col-sm-10">
				<select class="form-control" id="fm-app-env" name="app-env" >
					<option value="local">Local</option>
					<option value="production">Production</option>
					<option value="testing">Testing</option>
				</select>
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-4">
				<div class="checkbox">
					<label>
						<input type="checkbox" name="app-debug"> Debug
					</label>
				</div>
			</div>

			<div class=" col-sm-4">
				<div class="checkbox">
					<label>
						<input type="checkbox" name="app-debugbar"> DebugBar
					</label>
				</div>
			</div>
		</div>



		<h4>Mailgun <small><a href="http://www.mailgun.org" target="_blank">ver</a></small></h4>
		<div class="form-group">
			<label for="fm-mailgun-domain" class="col-sm-2 control-label text-right">Domain</label>

			<div class="col-sm-10">
				<input class="form-control" id="fm-mailgun-domain" name="mailgun-domain" placeholder="sandbox1234abcd.mailgun.org" type="text">
			</div>
		</div>

		<div class="form-group">
			<label for="fm-mailgun-secrect" class="col-sm-2 control-label text-right">Secrect</label>

			<div class="col-sm-10">
				<input class="form-control" id="fm-mailgun-secrect" name="mailgun-secrect" placeholder="key-1234abcd" type="text">
			</div>
		</div>


		<div class="row">
			<div class="col-md-6">
				<a href="{{ route('install.basededatos') }}" class="btn btn-default btn-block btn-flat">Volver</a>
			</div>
			<div class="col-md-6">
				<a href="{{ route('install.usuario') }}" class="btn btn-primary btn-block btn-flat">Siguente</a>
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
	class="alert-warning"
@endsection