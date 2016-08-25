@extends('install::layouts.master')

@section('title-box')
	REQUISITOS
@endsection

@section('content-box')

	<p>
		Requisitos.
	</p>

	<div class="row">
		<div class="col-md-6">
			<a href="{{ route('install.index') }}" class="btn btn-default btn-block btn-flat">Volver</a>
		</div>
		<div class="col-md-6">
			<a href="{{  route('install.configuracion') }}" class="btn btn-primary btn-block btn-flat">Siguente</a>
		</div>
	</div>

	
@endsection

@section('paso-1')
	class="alert-warning"
@endsection