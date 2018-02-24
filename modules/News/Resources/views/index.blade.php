@extends('admin::layouts.master')

@section('a-noticias', 'class="active"')

@section('a-contenido', 'active')

@section('header')
	<h1>Noticias <small>Lista</small>
		<div class="pull-right">
			<a class="btn btn-xs btn-success" href="{{ route('admin.noticias.create') }}"><i class="fa fa-plus"></i> Agregar noticia</a>

			<a class="btn btn-xs btn-success" href="{{ route('admin.noticias.categorias.create') }}"><i class="fa fa-plus"></i> Nueva categoria</a>
			<a class="btn btn-xs btn-primary" href="{{ route('admin.noticias.categorias.index') }}"><i class="fa fa-list"></i> Listar categorias</a>
		</div>
	</h1>
@endsection

@section('content')

	<div class="box box-solid">
		<div class="box-body">
			@if($news->count())					
				<table class="table table-striped">	

					<thead><tr><th colspan="2" class="btns-padre">
						<h4 class="pull-left"><strong>Ultimas noticias</strong></h4>

	{{-- 					<select class="pull-right">
							<option value="">todas</option>
							@foreach($noticias_categorias as $categoria)	
								 <option value="$categoria->id">.{{ $categoria->title }}</option>
							@endforeach
						</select>  --}}
						
					</th></tr></thead>


					<tbody>

						@foreach($news as $noticia)	
							<tr>
								<td class="btns-padre">
									<h3>
										{{ $noticia->title }}
										<br/>
										<small class="text-muted">
											<i class="fa fa-calendar" aria-hidden="true"></i> <span>{{ $noticia->created_at }}</span>
											&nbsp;
											<i class="fa fa-tag" aria-hidden="true"></i> <span class="text-capitalize">{{ $noticia->categoria->title }}</span>
											&nbsp;
											@if($noticia->important == 1)
												<i class="fa fa-star" aria-hidden="true"></i> <span>Destacado</span>
											@endif
										</small>
									</h3>
									<p>{!! nl2br(e($noticia->body)) !!}</p>
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
		</div>
	</div>

	@if($news->count())	
		{{ $news->links() }}
		<br/>
	@endif

@endsection
		