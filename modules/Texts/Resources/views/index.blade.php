@extends('admin::layouts.master')

@section('a-textos', 'class="active"')

@section('header')
	<h1>Textos <small>Lista</small>
		<div class="pull-right">
			<a class="btn btn-xs btn-success" href="{{ route('admin.textos.create') }}"><i class="fa fa-align-left"></i> Agregar texto</a>

			<a class="btn btn-xs btn-success" href="{{ route('admin.textos.categorias.create') }}"><i class="fa fa-plus"></i> Nueva categoria</a>
			<a class="btn btn-xs btn-primary" href="{{ route('admin.textos.categorias.index') }}"><i class="fa fa-list"></i> Listar categorias</a>
		</div>
	</h1>
@endsection

@section('content')

	<div class="box">

		@if($text_categories->count())			
			<div class="box-body">

				@foreach($text_categories as $category)

					<table class="table table-striped">
						<thead><tr><th colspan="2" class="btns-padre">
								<h4><strong>{{ ucfirst($category->title) }}:</strong>
									<div class="pull-right btns-nuevo-texto hidden">
										<a class="btn btn-xs btn-success pull-right" href="{{ route('admin.textos.create', ['selected' => $category->id]) }}"><i class="fa fa-plus"></i> Agregar texto</a>
									</div>
								</h4>
						</th></tr></thead>

						<tbody>
							@if($category->textos->count())		
									@foreach($category->textos as $text)
										<tr>
											<td class="nowrap"><strong>{{ ucfirst($text->title) }}</strong></td>
											<td class="btns-padre">{{$text->body}}
												<div class="nowrap btns-opciones hidden">
													<a class="btn btn-xs btn-warning" href="{{ route('admin.textos.edit', $text->id) }}"><i class="fa fa-edit"></i> Editar</a>
													<a class="btn btn-xs btn-primary" href="{{ route('admin.textos.show', $text->id) }}"><i class="fa fa-eye"></i> Ver</a>
													<form action="{{ route('admin.textos.destroy', $text->id) }}" method="POST" style="display: inline;" onsubmit="return confirmarBorrado();">
														<input type="hidden" name="_method" value="DELETE">
														<input type="hidden" name="_token" value="{{ csrf_token() }}">
														<button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Borrar</button>
													</form>
												</div>
											</td>
										</tr>
									@endforeach

							@else
								<tr><th colspan="2" class="text-center">
									vacio
								</th></tr>
							@endif
						</tbody>
					</table>

				@endforeach

			</div>
		@else
			<p class="text-center">Sin Elementos</p>
			<a class="btn btn-sm btn-success pull-right" href="{{ route('admin.textos.create') }}"><i class="fa fa-plus"></i> Nuevo Texto</a>
		@endif

	</div>

@endsection
		