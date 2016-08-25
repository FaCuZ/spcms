@extends('install::layouts.master')

@section('title-box')
	CONFIGURACION BASE
@endsection

@section('content-box')

	<p>
		Configuracion
	</p>

	<a href="{{  route('install.basededatos') }}" class="btn btn-primary btn-block btn-flat">Siguente</a>
	
@endsection