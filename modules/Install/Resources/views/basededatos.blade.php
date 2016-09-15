@extends('install::layouts.master')

@section('title-box')
	BASE DE DATOS
@endsection

@section('content-box')

	<form class="form-horizontal text-left" method="POST" action="{{ URL::route('install.basededatos.store') }}">
		{{ csrf_field() }}


		<div class="form-group">
			<label for="fm-bd-nombre" class="col-sm-2 control-label">Nombre</label>

			<div class="col-sm-10">
				<input class="form-control" id="fm-bd-nombre" name="bd-nombre" placeholder="base-de-datos" type="text">
			</div>
		</div>

		<div class="form-group">
			<label for="fm-bd-usuario" class="col-sm-2 control-label">Usuario</label>

			<div class="col-sm-10">
				<input class="form-control" id="fm-bd-usuario" name="bd-usuario" placeholder="root" type="text">
			</div>
		</div>

		<div class="form-group">
			<label for="fm-bd-password" class="col-sm-2 control-label">Password</label>

			<div class="col-sm-10">
				<input class="form-control" id="fm-bd-password" name="bd-password" placeholder="" type="text">
			</div>
		</div>


		<div class="row">
			<div class="col-md-6">
				<a href="{{ route('install.configuracion') }}" class="btn btn-default btn-block btn-flat">Volver</a>
			</div>
			<div class="col-md-6">
				<a href="{{ route('install.entorno') }}" class="btn btn-primary btn-block btn-flat">Siguente</a>
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
	class="alert-warning"
@endsection