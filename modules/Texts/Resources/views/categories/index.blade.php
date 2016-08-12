@extends('admin::layouts.master')

@section('a-imagenes', 'class="active"')

@section('header')
	<h1>Categorias <small>Lista</small></h1>
@endsection

@section('content')

	<div class="box box-solid">
		@if($text_categories->count())
			<div class="box-header">
				<h3 class="box-title">Categorias de las textos</h3>
				<a class="btn btn-sm btn-success pull-right" href="{{ route('admin.textos.categorias.create') }}"><i class="fa fa-plus"></i> Nuevo</a>
			</div>

			<div class="box-body no-padding">
				<table class="table table-striped">
					<tbody>
						@foreach($text_categories as $text_category)
							<tr>
								<td><strong>{{$text_category->title}}</strong></td>
								<td>{{$text_category->description}}</td>
								<td class="text-right nowrap">
									<a class="btn btn-xs btn-warning" href="{{ route('admin.textos.categorias.edit', $text_category->id) }}"><i class="fa fa-edit"></i> Editar</a>
									<a class="btn btn-xs btn-success" href="{{ route('admin.textos.categorias.create', ['text' => $text_category->id]) }}"><i class="fa fa-plus"></i> Nuevo Texto</a>
									<a class="btn btn-xs btn-primary" href="{{ route('admin.textos.categorias.show', $text_category->id) }}"><i class="fa fa-eye"></i> Ver</a>
									<form action="{{ route('admin.textos.categorias.destroy', $text_category->id) }}" method="POST" style="display: inline;" onsubmit="return confirmarBorrado();">
										<input type="hidden" name="_method" value="DELETE">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Borrar</button>
									</form>
								</td>
							</tr>
						@endforeach

					</tbody>
				</table>
			</div>
		@else
			<p class="text-center">Sin Elementos</p>
			<a class="btn btn-sm btn-success pull-right" href="{{ route('admin.textos.categorias.create') }}"><i class="fa fa-plus"></i> Nueva Categoria</a>
		@endif
	</div>

@endsection