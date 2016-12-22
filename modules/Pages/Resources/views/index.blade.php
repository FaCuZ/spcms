@extends('admin::layouts.master')

@section('a-paginas', 'class="active"')

@section('header')
	<h1>Paginas <small>Listado</small>
		<div class="pull-right">
			<a class="btn btn-xs btn-success" href="{{ route('admin.paginas.create') }}"><i class="fa fa-file-o"></i> Agregar pagina</a>
		</div>
	</h1>
@endsection

@section('content')
	<div class="box box-solid">

		<div class="box-body">
			@if($pages->count())
				<table class="table table-striped">	

					<thead><tr><th colspan="2" class="btns-padre">
						<h4><strong>Listado de paginas</strong></h4>
					</th></tr></thead>

					<tbody>

						@foreach($pages as $pagina)	
							<tr>
								<td>{{ $pagina->order }}</td>
								<td><strong>{{ ucfirst($pagina->title) }}</strong></td>
								<td class="nowrap">{{ url($pagina->path) }}</td>
								<td class="nowrap">{{ $pagina->editable ? 'true' : 'false' }}</td>
								<td class="btns-padre">
									<div class="nowrap btns-opciones hidden">
										<a class="btn btn-xs btn-info" href="{{ $pagina->path }}"><i class="fa fa-external-link"></i> Abrir</a>
										<a class="btn btn-xs btn-warning" href="{{ route('admin.paginas.edit', $pagina->id) }}"><i class="fa fa-edit"></i> Editar</a>
										<a class="btn btn-xs btn-primary" href="{{ route('admin.paginas.show', $pagina->id) }}"><i class="fa fa-eye"></i> Ver</a>
										<form action="{{ route('admin.paginas.destroy', $pagina->id) }}" method="POST" style="display: inline;" onsubmit="return confirmarBorrado();">
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
				<p class="tabla-empty">Error: No se encontraron paginas, por favor comuniquese con el administrador</p>
			@endif
		</div>
	</div>

@endsection
		