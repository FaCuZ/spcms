@extends('admin::layouts.master')

@section('a-links', 'class="active"')

@section('a-contenido', 'active')

@section('header')
	<h1>{!! button('links') !!} Links <small>Nuevo</small></h1>
@endsection

@section('content')
	
	<div class="box">
		<div class="box-body no-padding">

			<form action="{{ route('admin.links.store') }}" method="POST">
				<div class="modal-body">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<div class="form-group @if($errors->has('title')) has-error @endif">
						<label for="title-field">Titulo</label>
						<input type="text" id="title-field" name="title" class="form-control" value="{{ old("title") }}"/>
						@if($errors->has("title"))
							<span class="help-block">{{ $errors->first("title") }}</span>
						@endif
					</div>

					<div class="form-group @if($errors->has('link_category_id')) has-error @endif">
						<label for="body-field">Categoria</label>
						<div>								
							@if($link_categories->count())
								<select name="link_category_id">
									@foreach($link_categories as $categoria)					
										<option value="{{ $categoria->id }}" {{ $selected == $categoria->id ? 'selected="selected"' : '' }}>{{ $categoria->title }}</option>   
									@endforeach
								</select> 
							@endif
						</div>
					</div>

					<div class="form-group @if($errors->has('url')) has-error @endif">
						<label for="url-field">Url</label>
						<input type="url" id="url-field" name="url" class="form-control" value="{{ old("url") }}"/>						
						@if($errors->has("url"))
							<span class="help-block">{{ $errors->first("url") }}</span>
						@endif
					</div>
				</div>

				<div class="modal-footer">
					<a class="btn btn-default" href="{{ route('admin.links.index') }}">Cancelar</a>
					<button type="submit" class="btn btn-primary">Crear</button>
				</div>
			</form>

		</div>
	</div>
@endsection
