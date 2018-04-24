@extends('admin::layouts.master')

@section('a-imagenes', 'class="active"')

@section('a-contenido', 'active')

@section('header')
	<h1>{!! button('images') !!} Imagen <small>Nueva</small></h1>
@endsection

@section('content')
	<div class="box">
		<div class="box-body box-solid no-padding">

			<form action="{{ route('admin.imagenes.store') }}" method="POST" enctype="multipart/form-data">
				<div class="modal-body">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<div class="form-group @if($errors->has('title')) has-error @endif">
						<label for="title-field">Nombre</label>
						<input type="text" id="title-field" name="title" class="form-control" value="{{ old("title") }}"/>
						@if($errors->has("title"))
							<span class="help-block">{{ $errors->first("title") }}</span>
						@endif
					</div>

					<div class="form-group @if($errors->has('gallery_id')) has-error @endif">
						<label for="body-field">Galeria</label>
						<div>								
							@if($galleries->count())
								<select name="gallery_id">
									@foreach($galleries as $gallery)					
										<option value="{{ $gallery->id }}" {{ $selected == $gallery->id ? 'selected="selected"' : '' }}>{{ $gallery->title }}</option>   
									@endforeach
								</select> 
							@endif
						</div>
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

					<div class="form-group @if($errors->has('default_image_id')) has-error @endif">
						<label for="default_image_id-field" class="checkbox-inline">
 							<input type="checkbox" id="default_image_id-field" name="default_image_id" value="true"> Establecer como portada de la galeria.
 							{{-- <input type="checkbox" id="default_image_id-field" name="default_image_id" value="{{ old("default_image_id") }}"> Establecer como portada de la galeria. --}}
 						</label>
						@if($errors->has("default_image_id"))
							<span class="help-block">{{ $errors->first("default_image_id") }}</span>
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