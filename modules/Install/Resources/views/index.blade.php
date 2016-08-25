@extends('install::layouts.master')

@section('title-box')
	INICIO
@endsection

@section('content-box')

			<p>
				Bienvenido al sistema de instalacion de SPCMS.
			</p>

			<a href="{{  route('install.requisitos') }}" class="btn btn-primary btn-block btn-flat">Siguente</a>
	
@endsection