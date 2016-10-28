@extends('admin::layouts.master')

@section('a-noticias', 'class="active"')

@section('a-contenido', 'active')

@section('header')
	<h1>Noticias <small>Lista</small>
		<div class="pull-right">
			<a class="btn btn-xs btn-success" href="{{ route('admin.noticias.create') }}"><i class="fa fa-plus"></i> Agregar noticia</a>
		</div>
	</h1>
@endsection

@section('content')

	<div class="box box-solid">
		<div class="box-body">
			@if($news->count())					
				<table class="table table-striped">	

					<thead><tr><th colspan="2" class="btns-padre">
						<h4><strong>Ultimas noticias</strong></h4>
					</th></tr></thead>

					<tbody>

						@foreach($news as $noticia)	
							<tr>
								<td class="btns-padre">
									<h4>
										{{ $noticia->title }}
										<br/>
										<small class="text-muted">
											<i class="fa fa-calendar" aria-hidden="true"></i>
											{{ $noticia->created_at }}
										</small>
									</h4>
									<p>{{ $noticia->body }}</p>
									<div class="nowrap btns-opciones hidden">
										<a class="btn btn-xs btn-warning" href="{{ route('admin.noticias.edit', $noticia->id) }}"><i class="fa fa-edit"></i> Editar</a>
										<a class="btn btn-xs btn-primary" href="{{ route('admin.noticias.show', $noticia->id) }}"><i class="fa fa-eye"></i> Ver</a>
										<form action="{{ route('admin.noticias.destroy', $noticia->id) }}" method="POST" style="display: inline;" onsubmit="return confirmarBorrado();">
											<input type="hidden" name="_method" value="DELETE">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Borrar</button>
										</form>
									</div>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			@else
				<p class="tabla-empty">No hay ninguna noticia creada</p>
			@endif

{{-- 
		@if($text_categories->count())			
			<div class="box-body">

				@foreach($text_categories as $category)

					<table class="table table-striped">
						<thead><tr><th colspan="2" class="btns-padre">
								<h4><strong>{{ ucfirst($category->title) }}:</strong>
									<div class="pull-right btns-nuevo-texto hidden">
										<a class="btn btn-xs btn-success pull-right" href="{{ route('admin.noticias.create', ['selected' => $category->id]) }}"><i class="fa fa-plus"></i> Agregar texto</a>
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
													<a class="btn btn-xs btn-warning" href="{{ route('admin.noticias.edit', $text->id) }}"><i class="fa fa-edit"></i> Editar</a>
													<a class="btn btn-xs btn-primary" href="{{ route('admin.noticias.show', $text->id) }}"><i class="fa fa-eye"></i> Ver</a>
													<form action="{{ route('admin.noticias.destroy', $text->id) }}" method="POST" style="display: inline;" onsubmit="return confirmarBorrado();">
														<input type="hidden" name="_method" value="DELETE">
														<input type="hidden" name="_token" value="{{ csrf_token() }}">
														<button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Borrar</button>
													</form>
												</div>
											</td>
										</tr>
 									@endforeach

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
 --}}

		</div>
	</div>

@endsection
		