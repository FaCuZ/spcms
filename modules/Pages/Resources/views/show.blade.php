@extends('admin::layouts.master')

@section('a-faq', 'class="active"')

@section('header')
	<h1>
		{!! button('back') !!} Pagina <small>Mostrar: {{ $pagina->titulo }}</small>
		
		@if(Auth::user()->isAdmin)		
			<div class="pull-right">
				<a class="btn btn-xs btn-warning btn-group" role="group" href="{{ route('admin.paginas.edit', $pagina->id) }}"><i class="fa fa-edit"></i> Editar</a>
				<form action="{{ route('admin.paginas.destroy', $pagina->id) }}" method="POST" style="display: inline;" onsubmit="return confirmarBorrado();">
					<input type="hidden" name="_method" value="DELETE">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Borrar</button>
				</form>
			</div>
		@endif
	</h1>
@endsection

@section('content')

	<div class="box box-solid">
		<div class="box-body">
			
			<dl class="dl-horizontal">
				<dt>Id:</dt>
				<dd>{{ $pagina->id }}</dd>
				<dt>Nombre:</dt>
				<dd>{{ $pagina->title }}</dd>
				<dt>Ruta:</dt>
				<dd>{{ $pagina->path }}</dd>
				<dt>Orden:</dt>
				<dd>{{ $pagina->order }}</dd>
				<dt>Activo:</dt>
				<dd>{{ $pagina->active ? 'true' : 'false' }}</dd>
				<dt>Editable:</dt>
				<dd>{{ $pagina->editable ? 'true' : 'false' }}</dd>
			</dl>

			<div class="box-footer">
				<div class="text-center mostrar-avanzado-div">
					<a href="javascript:void(0)" class="mostrar-avanzado">Mostrar detalles avanzados</a>
				</div>

				<dl class="hidden dl-horizontal mostrar-avanzado-dl">
					@if(Auth::user()->isAdmin)
						<dt>Tablas:</dt>
						<dd>
							pages:
							{!! showTable($tabla_1, $pagina) !!}
						</dd>
					@endif

					<dt>Historial:</dt>
					<dd>
						pages:
						{!! showHistory($historial_1) !!}
					</dd>

				</dl>
			</div>


		</div>
	</div>

@endsection
	
