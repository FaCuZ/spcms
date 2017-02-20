@extends('admin::layouts.master')

@section('a-noticias', 'class="active"')

@section('a-contenido', 'active')

@section('header')
	<h1>{!! button('back') !!} Noticia <small>Nueva</small></h1>
@endsection

@section('content')
	@include('errors.error')
	
	<div class="box">
		<div class="box-body no-padding">

			<form action="{{ route('admin.noticias.store') }}" method="POST">
				<div class="modal-body">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<div class="form-group @if($errors->has('title')) has-error @endif">
						<label for="title-field">Titulo</label>
						<input type="text" id="title-field" name="title" class="form-control" value="{{ old("title") }}"/>
						@if($errors->has("title"))
							<span class="help-block">{{ $errors->first("title") }}</span>
						@endif
					</div>

					<div class="form-group @if($errors->has('body')) has-error @endif">
						<label for="body-field">Texto</label>
						<textarea class="form-control" id="body-field" rows="15" name="body">{{ old("body") }}</textarea>
						@if($errors->has("body"))
							<span class="help-block">{{ $errors->first("body") }}</span>
						@endif
					</div>
				</div>

				<div class="modal-footer">
					<a class="btn btn-default" href="{{ route('admin.noticias.index') }}">Cancelar</a>
					<button type="submit" class="btn btn-primary">Crear</button>
				</div>
			</form>

		</div>
	</div>
@endsection
