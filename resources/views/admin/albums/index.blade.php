@extends('admin.layouts.master')

@section('a-imagenes', 'class="active"')

@section('header')
	<h1>Albumes <small>Lista</small></h1>
@endsection

@section('content')

	<div class="box box-solid">
		@if($albums->count())
			<div class="box-header">
				<h3 class="box-title">Albumes de la web</h3>
				@if($rol=="admin")
					<a class="btn btn-sm btn-success pull-right" href="{{ route('admin.albums.create') }}"><i class="fa fa-plus"></i> Nuevo</a>
				@endif
			</div>

			<!-- /.box-header -->
			<div class="box-body no-padding">
				<table class="table table-striped">
					<tbody>
						@foreach($albums as $album)
							<tr>
								<td><strong>{{$album->title}}</strong></td>
								<td>{{$album->description}}</td>
								<td class="text-right nowrap">
									<a class="btn btn-xs btn-warning" href="{{ route('admin.albums.edit', $album->id) }}"><i class="fa fa-edit"></i> Editar</a>
									<a class="btn btn-xs btn-success" href="{{ route('admin.galerias.create', ['album' => $album->id]) }}"><i class="fa fa-plus"></i> Nueva Galeria</a>
									@if($rol=="admin")
										<a class="btn btn-xs btn-primary" href="{{ route('admin.albums.show', $album->id) }}"><i class="fa fa-eye"></i> Ver</a>
										<form action="{{ route('admin.albums.destroy', $album->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Esta seguro que quiere borrarlo?')) { return true } else {return false };">
											<input type="hidden" name="_method" value="DELETE">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Borrar</button>
										</form>
									@endif
								</td>
							</tr>
						@endforeach

					</tbody>
				</table>
			</div>
		@else
			<p class="text-center">Sin Elementos</p>
			@if($rol=="admin")
				<a class="btn btn-sm btn-success pull-right" href="{{ route('admin.albums.create') }}"><i class="fa fa-plus"></i> Nuevo</a>
			@endif
		@endif
	</div><!-- /.box -->

@endsection