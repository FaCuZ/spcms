@extends('admin.layouts.master')

@section('a-emails', 'class="active"')

@section('header')
	<h1>Emails <small>Configuracion</small></h1>
@endsection

@section('content')

	<div class="row">
		<div class="col-md-offset-3 col-md-6">

			<div class="box box-solid">
				<div class="box-header with-border text-center">
					<h3 class="box-title">Opciones</h3>
				</div>

				<div class="box-body">
					<p class="email-btns">	
						<a class="btn btn-default btn-lg" href="{{ URL::route('admin.textos.index') }}" role="button"><i class="fa fa-envelope-o"></i> <span>Ingresar a Webmail</span></a>
						<br/>
						<a class="btn btn-default btn-lg" href="{{ URL::route('admin.imagenes.index') }}" role="button"><i class="fa fa-plus"></i> <span>Nueva cuenta de Email</span></a>
						<br/>
						<a class="btn btn-default btn-lg" href="{{ URL::route('admin.imagenes.index') }}" role="button"><i class="fa fa-trash"></i> <span>Borrar cuenta de Email</span></a>
						<br/>
						<a class="btn btn-default btn-lg" href="{{ URL::route('admin.imagenes.index') }}" role="button"><i class="fa fa-key"></i> <span>Cambio de contraseña</span></a>
					</p>

				</div>
			</div>
		</div>
	</div>

@endsection
		