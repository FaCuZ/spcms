@extends('admin::layouts.master')

@section('a-imagenes', 'class="active"')

@section('a-contenido', 'active')

@section('header')
	<h1>
		{!! button('images') !!} Imagen <small>{{ $image->title }}</small>

		<div class="pull-right">
			<form action="{{ route('admin.imagenes.destroy', $image->id) }}" method="POST" style="display: inline;" onsubmit="return confirmarBorrado();">
				<input type="hidden" name="_method" value="DELETE">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="pull-right">
					<a class="btn btn-xs btn-warning btn-group" role="group" href="{{ route('admin.imagenes.edit', $image->id) }}"><i class="fa fa-edit"></i> Editar</a>
					<button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Borrar</button>
				</div>
			</form>
		</div>
	</h1>

@endsection

@section('content')

	<div class="box box-solid">

		<div class="box-body">


			<dl class="dl-horizontal">

				<dt>Id:</dt>
				<dd>{{ $image->id }}</dd>
				<dt>Nombre:</dt>
				<dd>{{ $image->title }}</dd>			
				<dt>Archivo:</dt>
				<dd><a href="{{ URL::asset($image->file) }}">{{ $image->file }}</a></dd>
				<dt>Miniatura:</dt>
				<dd><a href="{{ URL::asset($image->thumb) }}">{{ $image->thumb }}</a></dd>

				<dt>Galeria:</dt>
				<dd>{{ $gallery->title }}</dd>
				<dt>Album:</dt>
				<dd>{{ $album->title }}</dd>

				<dt>Descripcion:</dt>
				<dd>{{ $image->description }}</dd>
				<dt>Imagen:</dt>
				<dd><img src="{{ URL::asset($image->file) }}"></dd>
				<dt>Miniatura:</dt>
				<dd><img src="{{ URL::asset($image->thumb) }}"></dd>

			</dl>

			<div class="box-footer">
				<div class="text-center mostrar-avanzado-div">
					<a href="javascript:void(0)" class="mostrar-avanzado">Mostrar detalles avanzados</a>
				</div>

				<dl class="hidden dl-horizontal mostrar-avanzado-dl">
					@if(Auth::user()->isAdmin)
						<dt>Codigo:</dt>
						<dd>
							<pre class="pre-codigo">&lt;img src="&#123;&#123; $albumes->imagen('{{ $album->title }}', '{{ $gallery->title }}', '{{ $image->title }}')->url }}" /&gt;</pre>
							<pre class="pre-codigo">&#123;&#123; $albumes->imagen('{{ $album->title }}', '{{ $gallery->title }}', '{{ $image->title }}')->url }}</pre>
							Miniatura:
							<pre class="pre-codigo">&lt;img src="&#123;&#123; $albumes->imagen('{{ $album->title }}', '{{ $gallery->title }}', '{{ $image->title }}')->thumb }}" /&gt;</pre>
							<pre class="pre-codigo">&#123;&#123; $albumes->imagen('{{ $album->title }}', '{{ $gallery->title }}', '{{ $image->title }}')->thumb }}</pre>
						</dd>


						<dt>Tablas:</dt>
						<dd>
							images:
							{!! showTable($tabla_1, $image) !!}
							
							gallery:
							{!! showTable($tabla_2, $gallery) !!}

							album:
							{!! showTable($tabla_3, $album) !!}
						</dd>
					@endif

					<dt>Historial:</dt>
					<dd>
						images:
						{!! showHistory($historial_1) !!}

						gallery:
						{!! showHistory($historial_2) !!}

						album:
						{!! showHistory($historial_3) !!}
					</dd>
				</dl>

			</div>



		</div>
	</div>

@endsection