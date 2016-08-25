@extends('install::layouts.master')

@section('title-box')
	BASE DE DATOS
@endsection

@section('content-box')

	<p>
		base de datos
	</p>

	<a href="{{  route('install.usuario') }}" class="btn btn-primary btn-block btn-flat">Siguente</a>
	
@endsection