@extends('install::layouts.master')

@section('title-box')
	CONFIGURACION BASE
@endsection

@section('content-box')

	<form class="form-horizontal text-left" method="POST" action="{{ URL::route('install.configuracion.store') }}">
		{{ csrf_field() }}

		<div class="form-group">
			<label for="fm-nombre" class="col-sm-2 control-label text-right">Nombre</label>

			<div class="col-sm-10">
				<input class="form-control" id="fm-nombre" name="nombre" placeholder="Nombre de la pagina" type="text">
			</div>
		</div>

		<div class="form-group">
			<label for="fm-dominio" class="col-sm-2 control-label">Dominio</label>

			<div class="col-sm-10">
				<input class="form-control" id="fm-dominio" name="dominio" placeholder="www.ejemplo.com" type="text">
			</div>
		</div>


		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<div class="checkbox">
					<label>
						<input type="checkbox" name="emails"> Activar seccion de emails y soporte
					</label>
				</div>
			</div>
		</div>


		<div class="form-group">
			<label for="fm-webmail" class="col-sm-2 control-label">Webmail</label>

			<div class="col-sm-10">
				<input class="form-control" id="fm-webmail" name="webmail" placeholder="webmail.ejemplo.com" type="text">
			</div>
		</div>

		<div class="form-group">
			<label for="fm-email-base" class="col-sm-2 control-label">Email</label>

			<div class="col-sm-10">
				<input class="form-control" id="fm-email-base" name="email-base" placeholder="Email de la pagina: web@ejemplo.com" type="email">
			</div>
		</div>

		<div class="form-group">
			<label for="fm-email-soporte" class="col-sm-2 control-label">Soporte</label>

			<div class="col-sm-10">
				<input class="form-control" id="fm-email-soporte" name="email-soporte" placeholder="Email del soporte: soporte@tecnico.com" type="email">
			</div>
		</div>



		<div class="row">
			<div class="col-xs-6">
				<a href="{{ route('install.requisitos') }}" class="btn btn-default btn-block btn-flat">Volver</a>
			</div>
			<div class="col-xs-6">
				{{-- <a href="{{  route('install.entorno') }}" class="btn btn-primary btn-block btn-flat">Siguente</a> --}}
				<button type="submit" class="btn btn-primary btn-block btn-flat">Siguente</a>
			</div>
		</div>
	</form>


	
@endsection

@section('paso-1')
	class="alert-success"
@endsection

@section('paso-2')
	class="alert-warning"
@endsection