@extends('admin::layouts.master')

@section('a-historial', 'class="active"')

@section('header')

	<h1>Administrador<small>Historial</small></h1>

@endsection


@section('content')

	<div class="box">
		@if($history)
			<table class="table table-striped">
				<thead>
					<tr>
						<th colspan="5">
							<h4><strong>Textos:</strong></h4>
						</th>
					</tr>
					<tr>
						<th>Usuario</th>
						<th>Campo</th>
						<th>Valor</th>
						<th>Nuevo Valor</th>
						<th>Tiempo</th>
					</tr>
				</thead>

				<tbody>
					{{ dd($history) }}
					@foreach($history as $data)
					{{-- dd($data->toArray()) --}}
						<tr>
							<td>{{ $data->userResponsible()->name }}</td>
							<td>{{ $data->fieldName() }}</td>
							<td><code>{{ $data->oldValue() }}</code></td>
							<td><code>{{ $data->newValue() }}</code></td>
							<td class="nowrap">{{ $data->created_at->diffForHumans() }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		@else
			<p class="text-center">Sin Datos</p>
		@endif
	</div>

@endsection