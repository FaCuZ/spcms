@extends('admin.layouts.master')

@section('a-emails', 'class="active"')

@section('header')
	<h1>Emails <small>Configuracion</small></h1>
@endsection

@section('content')
	<p class="email-btns">	
		<a class="btn btn-default btn-lg" href="{{ URL::route('admin.textos.index') }}" role="button"><i class="fa fa-envelope-o"></i> <span>Ingrasar a Webmail</span></a>
		<br/>
		<a class="btn btn-default btn-lg" href="{{ URL::route('admin.imagenes.index') }}" role="button"><i class="fa fa-plus"></i> <span>Nueva cuenta</span></a>
		<br/>
		<a class="btn btn-default btn-lg" href="{{ URL::route('admin.imagenes.index') }}" role="button"><i class="fa fa-key"></i> <span>Cambio de contraseña</span></a>
	</p>

@endsection
		