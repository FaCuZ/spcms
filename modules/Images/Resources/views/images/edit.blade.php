@extends('admin::layouts.master')

@section('a-imagenes', 'class="active"')

@section('a-contenido', 'active')

@section('header')
	<h1>{!! button('back') !!} Imagen <small>Edicion</small></h1>
@endsection

@section('content')

	@include('errors.error')

	<div class="box box-default">

		<div class="box-body">

			<form action="{{ route('admin.imagenes.update', $image->id) }}" method="POST" enctype="multipart/form-data">
				<div class="modal-body">
					<input type="hidden" name="_method" value="PUT">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<div class="form-group @if($errors->has('title')) has-error @endif">
						<label for="title-field">Nombre</label>
						@if(Auth::user()->isAdmin)
							<input type="text" id="title-field" name="title" class="form-control" value="{{ $image->title }}"/>
						@else
							<p>{{ $image->title }}</p>
							<input type="hidden" id="title-field" name="title" value="{{ $image->title }}"/>
						@endif
						
						@if($errors->has("title"))
							<span class="help-block">{{ $errors->first("title") }}</span>
						@endif
					</div>

					<div class="form-group @if($errors->has('file')) has-error @endif">
						<label for="file-field">Imagen</label>
						<input type="file" id="file-field" name="file">
						@if($errors->has("file"))
							<span class="help-block">{{ $errors->first("file") }}</span>
						@endif
					</div>


					<div class="form-group @if($errors->has('description')) has-error @endif">
						<label for="description-field">Descripcion</label>
						<textarea class="form-control" id="description-field" rows="15" style="resize: vertical;" name="description">{{ $image->description }}</textarea>
						@if($errors->has("description"))
							<span class="help-block">{{ $errors->first("description") }}</span>
						@endif
					</div>

				</div>

				<div class="modal-footer">
					<a class="btn btn-default" href="{{ route('admin.imagenes.index') }}">Cancelar</a>
					<button type="submit" class="btn btn-primary" href="{{ route('admin.imagenes.index') }}">Guardar cambios</button>
				</div>
			</form>

		</div>
	</div>

@endsection
