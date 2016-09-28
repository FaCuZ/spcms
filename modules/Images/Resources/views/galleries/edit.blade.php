@extends('admin::layouts.master')

@section('a-imagenes', 'class="active"')

@section('a-contenido', 'active')

@section('header')
	<h1><a class="btn btn-default btn-xs" href="{{ route('admin.imagenes.index') }}"><i class="fa fa-chevron-left"></i></a> Galeria <small>Edicion</small></h1>
@endsection

@section('content')
	@include('errors.error')

	<div class="box box-solid">
	  <div class="box-header">
		<h3 class="box-title">{{ $gallery->title }}</h3>
	  </div>

	  <div class="box-body no-padding">

		<form action="{{ route('admin.galerias.update', $gallery->id) }}" method="POST">
		  <div class="modal-body">


		  	<input type="hidden" name="_method" value="PUT">
		  	<input type="hidden" name="_token" value="{{ csrf_token() }}">

			@if(Auth::user()->role=="admin")
				<div class="form-group @if($errors->has('title')) has-error @endif">
					<label for="title-field">Nombre</label>
					<input type="text" id="title-field" name="title" class="form-control" value="{{ $gallery->title }}"/>
			  		@if($errors->has("title"))
			  			<span class="help-block">{{ $errors->first("title") }}</span>
			  		@endif
			  	</div>
		  	@else
				<input type="hidden" id="title-field" name="title" value="{{ $gallery->title }}"/>
			@endif

			<div class="form-group @if($errors->has('description')) has-error @endif">
				<label for="description-field">Descripcion</label>
				<textarea class="form-control" id="description-field" rows="15" style="resize: vertical;" name="description">{{ $gallery->description }}</textarea>
				@if($errors->has("description"))
					<span class="help-block">{{ $errors->first("description") }}</span>
				@endif
			</div>

		  </div>

		  <div class="modal-footer">
			<a class="btn btn-default" href="{{ route('admin.galerias.index') }}">Cancelar</a>
			<button type="submit" class="btn btn-primary" href="{{ route('admin.galerias.index') }}">Guardar cambios</button>
		  </div>
		</form>

	  </div>
	</div>

@endsection
