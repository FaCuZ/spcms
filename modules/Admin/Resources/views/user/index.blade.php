@extends('admin::layouts.master')

@section('a-usuarios', 'class="active"')

@section('header')

	<h1>
		Administrador<small>Usuarios</small>

		@if(Auth::user()->role=="admin")
			<div class="pull-right">
				<a class="btn btn-xs btn-success" href="{{ route('admin.usuario.create') }}"><i class="fa fa-align-left"></i> Nuevo usuario</a>
			</div>
		@endif
	</h1>

@endsection


@section('content')

	<div class="box">
		@if($usuarios)
			<table class="table table-striped table-historial">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Email</th>
						<th>Rol</th>
						<th>Fecha</th>
						<th>Modificado</th>
						<th></th>
					</tr>
				</thead>

				<tbody>
					@foreach($usuarios as $data)
						<tr>
							<td><i class="fa fa-user"></i> {{ $data->name }}</td>
							<td>{{ $data->email }}</td>
							<td>{{ $data->role }}</td>
							<td class="nowrap">{{ $data->created_at or 'Siempre' }}</td>
							<td class="nowrap">{{ $data->updated_at or 'Nunca' }}</td>
							<td><a class="btn btn-xs btn-warning" href="{{ URL::route('admin.usuario', $data->id) }}"><i class="fa fa-edit"></i> Editar</a></td>
						</tr>
					@endforeach
				</tbody>
			</table>
		@else
			<p class="text-center">Sin usuarios</p>
		@endif		
	</div>

@endsection