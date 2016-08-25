@extends('install::layouts.master')

@section('title-box')
	Entorno
@endsection

@section('content-box')

	<p>
		Entorno
	</p>

	<div class="row">
		<div class="col-md-6">
			<a href="{{ route('install.configuracion') }}" class="btn btn-default btn-block btn-flat">Volver</a>
		</div>
		<div class="col-md-6">
			<a href="{{ route('install.basededatos') }}" class="btn btn-primary btn-block btn-flat">Siguente</a>
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
	class="alert-warning"
@endsection