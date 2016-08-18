@extends('admin::layouts.master')

@section('a-historial', 'class="active"')

@section('header')

	<h1>Administrador<small>Historial</small></h1>

@endsection


@section('content')

	<div class="box">
		@if(!empty($history))
			<table class="table table-striped table-historial">
				<thead>
					<tr>
						<th>Usuario</th>
						<th>Modelo</th>
						<th>Campo</th>
						<th>Valor</th>
						<th>Cambio</th>
						<th>Tiempo</th>
					</tr>
				</thead>

				<tbody>
					@foreach($history as $data)
						<tr onclick="window.location='{{ urlModelo($data) }}'">
							<td>{{ $data->userResponsible()->name }}</td>
							<td>{{ getModelo($data->revisionable_type) }}</td>
							<td>{{ $data->fieldName() }}</td>
							<td>
								<code>
									@if($data->fieldName() == 'Borrado')
										[{{ $data->revisionable_id }}]
									@else
										{{ $data->oldValue() }}
									@endif	
								</code>
							</td>
							<td><code>{{ $data->newValue() }}</code></td>
							<td class="nowrap">{{ $data->created_at->diffForHumans() }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			{{ $history->links() }}
		@else
			<p class="text-center">Sin Datos</p>
		@endif		
	</div>

@endsection