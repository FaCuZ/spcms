@extends('install::layouts.master')

@section('title-box')
	BASE DE DATOS
@endsection

@section('content-box')

	<p>
		base de datos
	</p>

	<div class="row">
		<div class="col-md-6">
			<a href="{{ route('install.entorno') }}" class="btn btn-default btn-block btn-flat">Volver</a>
		</div>
		<div class="col-md-6">
			<a href="{{ route('install.usuario') }}" class="btn btn-primary btn-block btn-flat">Siguente</a>
		</div>
	</div>
	
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