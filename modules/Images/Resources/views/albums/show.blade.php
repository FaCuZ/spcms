@extends('admin::layouts.master')

@section('a-imagenes', 'class="active"')

@section('a-contenido', 'active')

@section('header')
	<h1>{!! button('images') !!} Album <small>{{ $album->title }}</small>
		<div class="pull-right">
			<a class="btn btn-xs btn-warning btn-group" role="group" href="{{ route('admin.albums.edit', $album->id) }}"><i class="fa fa-edit"></i> Editar</a>
			<form action="{{ route('admin.albums.destroy', $album->id) }}" method="POST" style="display: inline;" onsubmit="return confirmarBorrado();">
				<input type="hidden" name="_method" value="DELETE">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<button type="submit" class="btn btn-xs btn-danger">Borrar <i class="fa fa-trash"></i></button>
			</form>
		</div>
	</h1>
@endsection

@section('content')
	<div class="box box-solid">
		<div class="box-body">

			<dl class="dl-horizontal">
				<dt>Id:</dt>
				<dd>{{ $album->id }}</dd>
				<dt>Nombre:</dt>
				<dd>{{ $album->title }}</dd>
			</dl>

		</div>
	</div>
@endsection