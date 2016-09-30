@extends('admin::layouts.master')

@section('a-faq', 'class="active"')

@section('a-contenido', 'active')

@section('header')
	<h1>Categoria <small>Edicion</small></h1>
@endsection

@section('content')
	@include('errors.error')

	<div class="box box-solid">
		<div class="box-header">
			<h3 class="box-title">{{ $faq_category->title }}</h3>
		</div>

		<div class="box-body no-padding">

			<form action="{{ route('admin.faq.categorias.update', $faq_category->id) }}" method="POST">
				<div class="modal-body">

					<input type="hidden" name="_method" value="PUT">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">

					@if(Auth::user()->role=="admin")
						<div class="form-group @if($errors->has('title')) has-error @endif">
							<label for="title-field">Nombre</label>
							<input type="text" id="title-field" name="title" class="form-control" value="{{ $faq_category->title }}"/>
							@if($errors->has("title"))
								<span class="help-block">{{ $errors->first("title") }}</span>
							@endif
						</div>
					@else
						<input type="hidden" id="title-field" name="title" value="{{ $faq_category->title }}"/>
					@endif

				</div>

				<div class="modal-footer">
					<a class="btn btn-default" href="{{ route('admin.faq.categorias.index') }}">Cancelar</a>
					<button type="submit" class="btn btn-primary" href="{{ route('admin.faq.categorias.index') }}">Guardar cambios</button>
				</div>
			</form>

		</div>
	</div>

@endsection

