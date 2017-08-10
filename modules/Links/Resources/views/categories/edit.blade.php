@extends('admin::layouts.master')

@section('a-links', 'class="active"')

@section('a-contenido', 'active')

@section('header')
	<h1>
		{!! button('links') !!} Categoria de links <small>Edicion: {{ $link_category->title }}</small>

		<div class="pull-right">
			<form action="{{ route('admin.links.categorias.destroy', $link_category->id) }}" method="POST" style="display: inline;" onsubmit="return confirmarBorrado()">
				<input type="hidden" name="_method" value="DELETE">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Borrar</button>
			</form>
		</div>
	</h1>

@endsection

@section('content')
	<div class="box box-solid">
		<div class="box-body">
			<form action="{{ route('admin.links.categorias.update', $link_category->id) }}" method="POST">
				<div class="modal-body">
					<input type="hidden" name="_method" value="PUT">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<div class="form-group @if($errors->has('title')) has-error @endif">
						<label for="title-field">Nombre</label>
						@if(Auth::user()->isAdmin)
							<input type="text" id="title-field" name="title" class="form-control" value="{{ $link_category->title }}"/>
						@else
							<p>{{ $link_category->title }}</p>
							<input type="hidden" id="title-field" name="title" value="{{ $link_category->title }}"/>
						@endif

						@if($errors->has("title"))
							<span class="help-block">{{ $errors->first("title") }}</span>
						@endif
					</div>

				</div>

				<div class="modal-footer">
					<a class="btn btn-default" href="{{ route('admin.links.categorias.index') }}">Cancelar</a>
					<button type="submit" class="btn btn-primary" href="{{ route('admin.links.categorias.index') }}">Guardar cambios</button>
				</div>
			</form>

		</div>
	</div>

@endsection

