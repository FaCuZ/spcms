{{ $data->getTable() }}:

@php($history = $data->revisionHistory)

@if(!$history->isEmpty())
	<table class="table table-striped table-historial-show">
		<thead>
			<tr>
				<th>Usuario</th>
				<th>Elemento</th>
				<th>Anterior</th>
				<th>Nuevo</th>
				<th>Tiempo</th>
			</tr>
		</thead>
		<tbody>
			@foreach($history as $data)
				<tr>
					<td>{{ $data->userResponsible()->name }}</td>
					<td>{{ $data->fieldName() }}</td>
					<td><code>{{ $data->oldValue() }}</code></td>
					<td><code>{{ $data->newValue() }}</code></td>
					<td class="nowrap">{{ $data->created_at->diffForHumans()}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	<p><small class="text-muted"><em>Sin cambios.</em></small><br/></p>
@endif