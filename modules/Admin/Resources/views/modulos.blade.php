@extends('admin::layouts.master')

@section('a-modulos', 'class="active"')

@section('header')

	<h1>Administrador<small>Modulos</small></h1>

@endsection


@section('content')

	<div class="box">


		@if($modulos)
			<table class="table table-striped table-historial">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Descripcion</th>
						<th>Ruta</th>
						<th>Estado</th>
						<th></th>
					</tr>
				</thead>

				<tbody>
					@foreach($modulos as $modulo)
						<tr>
							<td><i class="fa fa-cube"></i> {{ $modulo->name }}</td>
							<td>{{ $modulo->description }}</td>
							<td>{{ $modulo->getPath() }}</td>
							<td>
								@if($modulo->active == 1)
									<strong class="text-success">Activo</strong>
								@else
									<strong class="text-warning">Desactivo</strong>
								@endif
							</td>
							<td>
								@if($modulo->disabled == 0)
									@if($modulo->active == 1)
										<a class="btn btn-warning btn-xs" href="{{ URL::route('admin.modulos.off', ['name' => $modulo->name]) }}" role="button"><i class="fa fa-toggle-off"></i> <span>Desactivar</span></a>
									@else
										<a class="btn btn-success btn-xs" href="{{ URL::route('admin.modulos.on', ['name' => $modulo->name]) }}" role="button"><i class="fa fa-toggle-on"></i> <span>Activar</span></a>
									@endif
								@else
									<a class="btn btn-default btn-xs" href="#" role="button" disabled><i class="fa fa-on"></i> <span>Activar</span></a>
								@endif
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		@else
			<p class="text-center">Error: No hay modulos</p>
		@endif		
	</div>

@endsection