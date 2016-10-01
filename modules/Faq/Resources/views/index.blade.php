@extends('admin::layouts.master')

@section('a-faq', 'class="active"')

@section('a-contenido', 'active')

@section('header')
	<h1>FAQ <small>Lista</small>
		<div class="pull-right">
			<a class="btn btn-xs btn-success" href="{{ route('admin.faq.create') }}"><i class="fa fa-align-left"></i> Agregar texto</a>

			<a class="btn btn-xs btn-success" href="{{ route('admin.faq.categorias.create') }}"><i class="fa fa-plus"></i> Nueva categoria</a>
			<a class="btn btn-xs btn-primary" href="{{ route('admin.faq.categorias.index') }}"><i class="fa fa-list"></i> Listar categorias</a>
		</div>
	</h1>
@endsection

@section('content')

	<div class="box">

		@if($faq_categories->count())			
			<div class="box-body">

				@foreach($faq_categories as $category)

					<table class="table table-striped">
						<thead><tr><th colspan="2" class="btns-padre">
								<h4><strong>{{ ucfirst($category->title) }}:</strong>
									<div class="pull-right btns-nuevo-texto hidden">
										<a class="btn btn-xs btn-success pull-right" href="{{ route('admin.faq.create', ['selected' => $category->id]) }}"><i class="fa fa-plus"></i> Agregar texto</a>
									</div>
								</h4>
						</th></tr></thead>

						<tbody>
							@if($category->faq->count())		
									@foreach($category->faq as $faq)
										<tr>
											<td class="nowrap"><strong>{{ ucfirst($faq->question) }}</strong></td>
											<td class="btns-padre">{{$faq->answer}}
												<div class="nowrap btns-opciones hidden">
													<a class="btn btn-xs btn-warning" href="{{ route('admin.faq.edit', $faq->id) }}"><i class="fa fa-edit"></i> Editar</a>
													<a class="btn btn-xs btn-primary" href="{{ route('admin.faq.show', $faq->id) }}"><i class="fa fa-eye"></i> Ver</a>
													<form action="{{ route('admin.faq.destroy', $faq->id) }}" method="POST" style="display: inline;" onsubmit="return confirmarBorrado();">
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
			<p class="tabla-empty">No hay ninguna categoria creada</p>
		@endif

	</div>

@endsection
		