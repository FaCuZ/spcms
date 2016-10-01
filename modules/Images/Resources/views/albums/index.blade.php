@extends('admin::layouts.master')

@section('a-imagenes', 'class="active"')

@section('a-contenido', 'active')

@section('header')
	<h1>
		<a class="btn btn-default btn-xs" href="{{ route('admin.imagenes.index') }}"><i class="fa fa-chevron-left"></i></a> Albumes 
		<small>Lista</small>

		@if(Auth::user()->role=="admin")
			<div class="pull-right">
				<a class="btn btn-xs btn-success" href="{{ route('admin.albums.create') }}"><i class="fa fa-plus"></i> Nuevo album</a>
			</div>
		@endif
	</h1>
@endsection

@section('content')

	<div class="box box-solid">
		@if($albums->count())
			<div class="box-body no-padding">
				<table class="table table-striped">
					<tbody>
						@foreach($albums as $album)
							<tr>
								<td><strong>{{$album->title}}</strong></td>
								<td>{{$album->description}}</td>
								@if(Auth::user()->role=="admin")
									<td class="text-right nowrap">
										<a class="btn btn-xs btn-warning" href="{{ route('admin.albums.edit', $album->id) }}"><i class="fa fa-edit"></i> Editar</a>
										<a class="btn btn-xs btn-success" href="{{ route('admin.galerias.create', ['album' => $album->id]) }}"><i class="fa fa-plus"></i> Nueva Galeria</a>
										<a class="btn btn-xs btn-primary" href="{{ route('admin.albums.show', $album->id) }}"><i class="fa fa-eye"></i> Ver</a>
										<form action="{{ route('admin.albums.destroy', $album->id) }}" method="POST" style="display: inline;" onsubmit="return confirmarBorrado();">
											<input type="hidden" name="_method" value="DELETE">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Borrar</button>
										</form>
									</td>
								@endif
							</tr>
						@endforeach

					</tbody>
				</table>
			</div>
		@else
			<p class="tabla-empty">No hay ninguna album creado</p>
			@if(Auth::user()->role=="admin")
				<a class="btn btn-sm btn-success pull-right" href="{{ route('admin.albums.create') }}"><i class="fa fa-plus"></i> Nuevo</a>
			@endif
		@endif
	</div>

@endsection