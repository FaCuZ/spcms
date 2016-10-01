@extends('admin::layouts.master')

@section('a-usuarios', 'class="active"')

@section('header')
	<h1>
		<a class="btn btn-default btn-xs" href="{{ route('admin.usuarios') }}"><i class="fa fa-chevron-left"></i></a> Administrador
		<small>Usuario</small>
									
		<div class="pull-right">
			<form action="{{ route('admin.textos.destroy', $usuario->id) }}" method="POST" style="display: inline;" onsubmit="return confirmarBorrado()">
				<input type="hidden" name="_method" value="DELETE">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Borrar</button>
			</form>
		</div>

	</h1>
@endsection

@section('content')
	@include('errors.error')
	
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">{{ $usuario->name }}</h3>
		</div>

		<div class="box-body no-padding">

			<form action="{{ route('admin.usuario.update', $usuario->id) }}" method="POST">
				<div class="modal-body">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					
					<div class="form-group @if($errors->has('name')) has-error @endif">
						<label for="name-field">Nombre</label>
						<input type="text" id="name-field" name="name" class="form-control" value="{{ $usuario->name }}"/>
						@if($errors->has("name"))
							<span class="help-block">{{ $errors->first("name") }}</span>
						@endif
					</div>

					<div class="form-group @if($errors->has('role')) has-error @endif">
						<label for="body-field">Rol</label>
						<div>
							<select name="role">								
								<option value="none" {{ $usuario->role == 'none' ? 'selected="selected"' : '' }}>Ninguno</option>   
								<option value="admin" {{ $usuario->role == 'admin' ? 'selected="selected"' : '' }}>Administrador</option>   
								<option value="client" {{ $usuario->role == 'client' ? 'selected="selected"' : '' }}>Cliente</option>   
							</select> 								
						</div>
						
					</div>

					<div class="form-group @if($errors->has('email')) has-error @endif">
						<label for="email-field">Email</label>
						<input type="text" class="form-control" id="email-field" name="email" value="{{ $usuario->email }}"/>
							@if($errors->has("email"))
								<span class="help-block">{{ $errors->first("email") }}</span>
							@endif
					</div>

					<p><label for="name-field">Creado:</label> {{ $usuario->created_at or 'Siempre' }}</p>
					<p><label for="name-field">Modificado:</label> {{ $usuario->updated_at or 'Nunca' }}</p>

				</div>

				<div class="modal-footer">
					<a class="btn btn-default" href="{{ route('admin.usuarios') }}">Cancelar</a>
					<button type="submit" class="btn btn-primary">Guardar cambios</button>
				</div>
			</form>

		</div>
	</div>

@endsection


