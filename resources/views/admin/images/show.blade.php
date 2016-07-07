@extends('admin.layouts.master')

@section('a-imagenes', 'class="active"')

@section('header')
	<h1>Imagen <small>{{ $image->title }}</small></h1>
@endsection

@section('content')


	<div class="box box-solid">

		<div class="box-body">

			<p><strong>Id: </strong> {{$image->id}}</p>           
			<p><strong>Titulo: </strong>{{$image->title}}</p>

			<strong>Cuerpo: </strong>
			<p>{{$image->description}}</p>


			<a class="btn btn-default pull-left" href="{{ route('admin.imagenes.index') }}">Cancelar</a>

			<form action="{{ route('admin.imagenes.destroy', $image->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Esta seguro que quiere borrarlo?')) { return true } else {return false };">
				<input type="hidden" name="_method" value="DELETE">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="pull-right">
					<a class="btn btn-warning btn-group" role="group" href="{{ route('admin.imagenes.edit', $image->id) }}"><i class="fa fa-edit"></i> Editar</a>
					<button type="submit" class="btn btn-danger">Borrar <i class="fa fa-trash"></i></button>
				</div>
			</form>

		</div>
	</div>


@endsection