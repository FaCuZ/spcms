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
						</tr>
					@endforeach
				</tbody>
			</table>
		@else
			<p class="text-center">Error: No hay modulos</p>
		@endif		
	</div>

@endsection