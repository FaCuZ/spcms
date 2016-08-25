@extends('install::layouts.master')

@section('title-box')
	REQUISITOS
@endsection

@section('content-box')

			<p>
				Requisitos.
			</p>

			<a href="{{  route('install.configuracion') }}" class="btn btn-primary btn-block btn-flat">Siguente</a>
	
@endsection