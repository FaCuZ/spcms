@extends('admin::layouts.master')

@section('a-imagenes', 'class="active"')

@section('header')
	<h1><a class="btn btn-default btn-xs" href="{{ route('admin.imagenes.index') }}"><i class="fa fa-chevron-left"></i></a> Imagen <small>{{ $image->title }}</small>
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
			<p><strong>Nombre: </strong>[{{$image->id}}] {{$image->title}}</p>			
			<p><strong>Archivo: </strong><a href="{{ URL::asset($image->file) }}">{{$image->file}}</a></p>			
			<p><strong>Descripcion: </strong>{{$image->description}}</p>

			<p><img src="{{ URL::asset($image->file) }}"></p>

		</div>
	</div>

@endsection