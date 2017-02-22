@extends('admin::layouts.master')

@section('a-imagenes', 'class="active"')

@section('a-contenido', 'active')

@section('header')
	<h1>{!! button('images') !!} Galeria <small>Nueva</small></h1>
@endsection

@section('content')
	<div class="box box-solid">

		<div class="box-body">

			<form action="{{ route('admin.galerias.store') }}" method="POST">
				<div class="modal-body">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<div class="form-group @if($errors->has('title')) has-error @endif">
						<label for="title-field">Nombre</label>
						<input type="text" id="title-field" name="title" class="form-control" value="{{ old("title") }}"/>
						@if($errors->has("title"))
							<span class="help-block">{{ $errors->first("title") }}</span>
						@endif
					</div>


					<div class="form-group @if($errors->has('album_id')) has-error @endif">
						<label for="body-field">Album</label>
						<div>								
							@if($albums->count())
								<select name="album_id">
									@foreach($albums as $album)					
										<option value="{{ $album->id }}" {{ $selected == $album->id ? 'selected="selected"' : '' }}>{{ $album->title }}</option>   
									@endforeach
								</select> 
							@endif
						</div>
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
					<a class="btn btn-default" href="{{ route('admin.galerias.index') }}">Cancelar</a>
					<button type="submit" class="btn btn-primary">Crear</button>
				</div>
			</form>

		</div>
	</div>
@endsection