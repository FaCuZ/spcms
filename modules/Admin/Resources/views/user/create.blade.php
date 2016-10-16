@extends('admin::layouts.master')

@section('a-usuarios', 'class="active"')

@section('header')
	<h1>
		<a class="btn btn-default btn-xs" href="{{ route('admin.usuarios') }}"><i class="fa fa-chevron-left"></i></a> Usuario
		<small>Nuevo</small>
	</h1>
@endsection

@section('content')
	@include('errors.error')
	
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Nuevo usuario</h3>
		</div>

		<div class="box-body no-padding">

			<form action="{{ route('admin.usuario.store') }}" method="POST">
				<div class="modal-body">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					
					<div class="form-group @if($errors->has('name')) has-error @endif">
						<label for="name-field">Nombre</label>
						<input type="text" id="name-field" name="name" class="form-control"/>
						@if($errors->has("name"))
							<span class="help-block">{{ $errors->first("name") }}</span>
						@endif
					</div>

					<div class="form-group @if($errors->has('role')) has-error @endif">
						<label for="body-field">Rol</label>
						<div>
							<select name="role">								
								<option value="none" selected="selected">Ninguno</option>   
								<option value="admin">Administrador</option>   
								<option value="client">Cliente</option>   
							</select> 								
						</div>
						
					</div>

					<div class="form-group @if($errors->has('email')) has-error @endif">
						<label for="email-field">Email</label>
						<input type="text" class="form-control" id="email-field" name="email"/>
							@if($errors->has("email"))
								<span class="help-block">{{ $errors->first("email") }}</span>
							@endif
					</div>
				</div>

				<div class="modal-footer">
					<a class="btn btn-default" href="{{ route('admin.usuarios') }}">Cancelar</a>
					<button type="submit" class="btn btn-primary">Crear usuario</button>
				</div>
			</form>

		</div>
	</div>

@endsection


