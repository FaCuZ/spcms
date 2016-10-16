@extends('admin::layouts.master')

@section('a-imagenes', 'class="active"')

@section('a-contenido', 'active')

@section('header')
	<h1>{!! button('images') !!} Album <small>{{ $album->title }}</small></h1>
@endsection

@section('content')
	<div class="box box-solid">
		<div class="box-body">

			<p><strong>Id: </strong> {{$album->id}}</p>
			<p><strong>Titulo: </strong>{{$album->title}}</p>

			<a class="btn btn-default pull-left" href="{{ route('admin.albums.index') }}">Cancelar</a>

			<form action="{{ route('admin.albums.destroy', $album->id) }}" method="POST" style="display: inline;" onsubmit="return confirmarBorrado();">
				<input type="hidden" name="_method" value="DELETE">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="pull-right">
					<a class="btn btn-warning btn-group" role="group" href="{{ route('admin.albums.edit', $album->id) }}"><i class="fa fa-edit"></i> Editar</a>
					<button type="submit" class="btn btn-danger">Borrar <i class="fa fa-trash"></i></button>
				</div>
			</form>

		</div>
</div>


@endsection