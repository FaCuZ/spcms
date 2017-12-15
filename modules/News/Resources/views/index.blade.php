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

@endsection
		