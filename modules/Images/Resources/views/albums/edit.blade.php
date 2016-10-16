@extends('admin::layouts.master')

@section('a-imagenes', 'class="active"')

@section('a-contenido', 'active')

@section('header')
	<h1>{!! button('back') !!} Album <small>Edicion</small></h1>
@endsection

@section('content')
	@include('errors.error')

	<div class="box box-solid">
		<div class="box-body">

			<form action="{{ route('admin.albums.update', $album->id) }}" method="POST">
				<div class="modal-body">

					<input type="hidden" name="_method" value="PUT">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<div class="form-group @if($errors->has('title')) has-error @endif">
						<label for="title-field">Nombre</label>
						<input type="text" id="title-field" name="title" class="form-control" value="{{ $album->title }}"/>
						@if($errors->has("title"))
							<span class="help-block">{{ $errors->first("title") }}</span>
						@endif
					</div>

				</div>

				<div class="modal-footer">
					<a class="btn btn-default" href="{{ route('admin.albums.index') }}">Cancelar</a>
					<button type="submit" class="btn btn-primary" href="{{ route('admin.albums.index') }}">Guardar cambios</button>
				</div>
			</form>

		</div>
	</div>

@endsection

