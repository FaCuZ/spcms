@extends('admin::layouts.master')

@section('a-imagenes', 'class="active"')

@section('a-contenido', 'active')

@section('header')
	<h1><a class="btn btn-default btn-xs" href="{{ route('admin.imagenes.index') }}"><i class="fa fa-chevron-left"></i></a> Imagen <small>Nueva</small></h1>
@endsection

@section('content')
	@include('errors.error')

	<div class="box">
		<div class="box-body box-solid no-padding">

			<form action="{{ route('admin.imagenes.store') }}" method="POST" enctype="multipart/form-data">
				<div class="modal-body">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<input type="hidden" name="gallery_id" value="{{ $gallery->id }}">

					<div class="form-group @if($errors->has('title')) has-error @endif">
						<label for="title-field">Nombre</label>
						<input type="text" id="title-field" name="title" class="form-control" value="{{ old("title") }}"/>
						@if($errors->has("title"))
							<span class="help-block">{{ $errors->first("title") }}</span>
						@endif
					</div>

					<div class="form-group @if($errors->has('file')) has-error @endif">
						<label for="file-field">Imagen</label>
						{{-- <input type="text" id="title-field" name="title" class="form-control" value="{{ old("title") }}"/> --}}
						<input type="file" id="file-field" name="file" value="{{ old("file") }}">
						@if($errors->has("file"))
							<span class="help-block">{{ $errors->first("file") }}</span>
						@endif
					</div>


					<div class="form-group @if($errors->has('description')) has-error @endif">
						<label for="description-field">Descripcion</label>
						<textarea class="form-control" id="description-field" rows="15" name="description">{{ old("description") }}</textarea>
						@if($errors->has("description"))
							<span class="help-block">{{ $errors->first("description") }}</span>
						@endif
					</div>
				</div>

				<div class="modal-footer">
					<a class="btn btn-default" href="{{ route('admin.imagenes.index') }}">Cancelar</a>
					<button type="submit" class="btn btn-primary">Crear</button>
				</div>
			</form>

		</div>
	</div>
@endsection