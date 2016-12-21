@extends('admin::layouts.master')

@section('a-paginas', 'class="active"')

@section('a-contenido', 'active')

@section('header')
	<h1>{!! button('back') !!} Pagina <small>Nueva</small></h1>
@endsection

@section('content')
	@include('errors.error')
	
	<div class="box">
		<div class="box-body no-padding">

			<form action="{{ route('admin.paginas.store') }}" method="POST">
				<div class="modal-body">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<div class="form-group @if($errors->has('title')) has-error @endif">
						<label for="title-field">Nombre</label>
						<input type="text" id="title-field" name="title" class="form-control" value="{{ old("title") }}"/>
						@if($errors->has("title"))
							<span class="help-block">{{ $errors->first("title") }}</span>
						@endif
					</div>

					<div class="form-group @if($errors->has('path')) has-error @endif">
						<label for="path-field">Ruta</label>
						<input type="text" id="path-field" name="path" class="form-control" value="{{ old("path") }}"/>
						@if($errors->has("path"))
							<span class="help-block">{{ $errors->first("path") }}</span>
						@endif
					</div>

					<div class="form-group @if($errors->has('order')) has-error @endif">
						<label for="order-field">Orden</label>
						<input type="number" id="order-field" name="order" class="form-control" value="{{ old("order") }}"/>
						@if($errors->has("order"))
							<span class="help-block">{{ $errors->first("order") }}</span>
						@endif
					</div>


				</div>

				<div class="modal-footer">
					<a class="btn btn-default" href="{{ route('admin.paginas.index') }}">Cancelar</a>
					<button type="submit" class="btn btn-primary">Crear</button>
				</div>
			</form>

		</div>
	</div>
@endsection
