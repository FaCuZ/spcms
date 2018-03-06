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
					<a class="btn btn-xs btn-warning btn-group" role="group" href="{{ route('admin.imagenes.edit', [$image->id, 'selected' => $image->gallery_id]) }}"><i class="fa fa-edit"></i> Editar</a>
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

			@component('admin::partial.advance', ['data' => [$image, $gallery, $album]])
				<dd>
					<pre class="pre-codigo">&lt;img src="&#64;image('{{ $album->title }}', '{{ $gallery->title }}', '{{ $image->title }}')" /&gt;</pre>
					<pre class="pre-codigo">&#64;image('{{ $album->title }}', '{{ $gallery->title }}', '{{ $image->title }}')</pre>
					Miniatura:
					<pre class="pre-codigo">&lt;img src="&#64;thumb('{{ $album->title }}', '{{ $gallery->title }}', '{{ $image->title }}')" /&gt;</pre>
					<pre class="pre-codigo">&#64;thumb('{{ $album->title }}', '{{ $gallery->title }}', '{{ $image->title }}')</pre>
				</dd>
			@endcomponent

		</div>
	</div>

@endsection