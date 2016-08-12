@extends('admin::layouts.master')

@section('a-imagenes', 'class="active"')

@section('header')
	<h1>
		<a class="btn btn-default btn-xs" href="{{ route('admin.textos.index') }}"><i class="fa fa-chevron-left"></i></a> Categoria 
		<small>Nueva</small>
	</h1>
@endsection

@section('content')
	@include('errors.error')

	<div class="box box-solid">
		<div class="box-body no-padding">

			<form action="{{ route('admin.textos.categorias.store') }}" method="POST">
				<div class="modal-body">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<div class="form-group @if($errors->has('title')) has-error @endif">
						<label for="title-field">Nombre</label>
						<input type="text" id="title-field" name="title" class="form-control" value="{{ old("title") }}"/>
						@if($errors->has("title"))
							<span class="help-block">{{ $errors->first("title") }}</span>
						@endif
					</div>
				</div>

				<div class="modal-footer">
					<a class="btn btn-default" href="{{ route('admin.textos.categorias.index') }}">Cancelar</a>
					<button type="submit" class="btn btn-primary">Crear</button>
				</div>
			</form>

		</div>
	</div>
@endsection