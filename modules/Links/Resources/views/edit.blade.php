
@extends('admin::layouts.master')

@section('a-links', 'class="active"')

@section('a-contenido', 'active')

@section('header')
	<h1>
		{!! button('links') !!} Link <small>Edicion: {{ $link->title }}</small>

		<div class="pull-right">
			<form action="{{ route('admin.links.destroy', $link->id) }}" method="POST" style="display: inline;" onsubmit="return confirmarBorrado()">
				<input type="hidden" name="_method" value="DELETE">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Borrar</button>
			</form>
		</div>

	</h1>
@endsection

@section('content')
	<div class="box">
		<div class="box-body">

			<form action="{{ route('admin.links.update', $link->id) }}" method="POST">
				<div class="modal-body">


					<input type="hidden" name="_method" value="PUT">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					
					<div class="form-group @if($errors->has('title')) has-error @endif">
						<label for="title-field">Nombre</label>
						@if(Auth::user()->isAdmin)
							<input type="text" id="title-field" name="title" class="form-control" value="{{ $link->title }}"/>
						@else
							<p>{{ $link->title }}</p>
							<input type="hidden" id="title-field" name="title" value="{{ $link->title }}"/>
						@endif

						@if($errors->has("title"))
							<span class="help-block">{{ $errors->first("title") }}</span>
						@endif
					</div>

					<div class="form-group @if($errors->has('link_category_id')) has-error @endif">
						<label for="cat-field">Categoria</label>
						<div>		
						    @if ($link_categories->count())
								<select name="link_category_id" id="cat-field">
	        						@foreach($link_categories as $categoria)					
		            					<option value="{{ $categoria->id }}" {{ $selected == $categoria->id ? 'selected="selected"' : '' }}>{{ $categoria->title }}</option>   
									@endforeach
								</select> 
							@endif
								
						</div>
						
					</div>

					<div class="form-group @if($errors->has('url')) has-error @endif">
						<label for="url-field">Texto</label>
						<input type="url" id="url-field" name="url" class="form-control" value="{{ $link->url }}"/>
						@if($errors->has("url"))
							<span class="help-block">{{ $errors->first("url") }}</span>
						@endif
					</div>

				</div>

				<div class="modal-footer">
					<a class="btn btn-default" href="{{ route('admin.links.index') }}">Cancelar</a>
					<button type="submit" class="btn btn-primary" href="{{ route('admin.links.index') }}">Guardar cambios</button>
				</div>
			</form>

		</div>
	</div>

@endsection
