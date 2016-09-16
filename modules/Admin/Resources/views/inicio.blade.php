@extends('admin::layouts.master')

@section('a-inicio', 'class="active"')

@section('header')

	<h1>Web<small>Sistema de administracion</small></h1>

@endsection


@section('content')

	<div class="jumbotron">
		<h1>Bienvenido</h1>
		<p class="jumbotron-text">Desde este sistema podrás modificar la pagina a tu gusto, tanto textos como imágenes. Recuerde que para ingresar nuevos textos a la pagina deberá contactar al administrador.</p>
		<p>
			@if(Module::find('Texts')->active == 1)
				<a class="btn btn-default btn-lg" href="{{ URL::route('admin.textos.index') }}" role="button"><i class="fa fa-file-text-o"></i> <span>Textos</span></a>
			@endif
			@if(Module::find('Images')->active == 1)
				<a class="btn btn-default btn-lg" href="{{ URL::route('admin.imagenes.index') }}" role="button"><i class="fa fa-image"></i> <span>Imágenes</span></a>
			@endif
		</p>
		<p class="jumbotron-text">Si necesitas ayuda puedes solicitarla desde la seccion de <a href="{{ URL::route('admin.ayuda') }}">soporte</a>.</p>
	</div>


	@if(Auth::user()->role=="admin")
		<br/>
		<p class="text-center">
			<a class="btn btn-primary btn-lg" href="{{ URL::route('admin.clear') }}" role="button"><i class="fa fa-database"></i> <span>Limpiar Cache</span></a>
		</p>
		<p class="text-center">
			@if($cache)
				<a class="btn btn-danger btn-lg" href="{{ URL::route('admin.cache.off') }}" role="button"><i class="fa fa-toggle-off"></i> <span>Desactivar Cache</span></a>
			@else
				<a class="btn btn-success btn-lg" href="{{ URL::route('admin.cache.on') }}" role="button"><i class="fa fa-toggle-on"></i> <span>Activar Cache</span></a>
			@endif		
		</p>
		<p class="text-center">
			@if($down)
				<a class="btn btn-success btn-lg" href="{{ URL::route('admin.up') }}" role="button"><i class="fa fa-check"></i> <span>Activar pagina web</span></a>
			@else
				<a class="btn btn-danger btn-lg" href="{{ URL::route('admin.down') }}" role="button"><i class="fa fa-power-off"></i> <span>Modo de mantenimiento</span></a>
			@endif
		</p>
	@endif


@endsection
