@extends('admin::layouts.master')

@section('a-faq', 'class="active"')

@section('a-contenido', 'active')

@section('header')
	<h1>
		{!! button('back') !!} Categorias <small>Lista</small>
		<div class="pull-right">
			<a class="btn btn-xs btn-success" href="{{ route('admin.faq.categorias.create') }}"><i class="fa fa-plus"></i> Nueva categoria</a>
		</div>

	</h1>
@endsection

@section('content')

	<div class="box box-solid">
		@if($faq_categories->count())
			<div class="box-body">
				<table class="table table-striped">
					<tbody>
						@foreach($faq_categories as $faq_category)
							<tr>
								<td><strong>{{$faq_category->title}}</strong></td>
								<td>{{$faq_category->description}}</td>
								<td class="text-right nowrap">
									<a class="btn btn-xs btn-success" href="{{ route('admin.faq.categorias.create', ['faq' => $faq_category->id]) }}"><i class="fa fa-plus"></i> Nuevo Texto</a>
									<a class="btn btn-xs btn-primary" href="{{ route('admin.faq.categorias.show', $faq_category->id) }}"><i class="fa fa-eye"></i> Ver</a>
									@if(Auth::user()->isAdmin)
										<a class="btn btn-xs btn-warning" href="{{ route('admin.faq.categorias.edit', $faq_category->id) }}"><i class="fa fa-edit"></i> Editar</a>
										<form action="{{ route('admin.faq.categorias.destroy', $faq_category->id) }}" method="POST" style="display: inline;" onsubmit="return confirmarBorrado();">
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
			<a class="btn btn-sm btn-success pull-right" href="{{ route('admin.faq.categorias.create') }}"><i class="fa fa-plus"></i> Nueva Categoria</a>
		@endif
	</div>

@endsection