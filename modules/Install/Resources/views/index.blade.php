@extends('install::layouts.master')

@section('title-box')
	INICIO
@endsection

@section('content-box')

	<p>
		Bienvenido al sistema de instalacion de SPCMS. 
	</p>
	<p>
		Desde este sistema podra configurar los datos iniciales y realizar comprobaciones basicas.
	</p>

	<a href="{{  route('install.requisitos') }}" class="btn btn-primary btn-block btn-flat">Empezar</a>
	
@endsection