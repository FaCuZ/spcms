
@extends('admin.layouts.master')

@section('a-textos', 'class="active"')

@section('header')
	<h1>
		<a class="btn btn-default btn-xs" href="{{ route('admin.textos.index') }}"><i class="fa fa-chevron-left"></i></a> Textos
		<small>Edicion</small>
									
		<div class="pull-right">
			<form action="{{ route('admin.textos.destroy', $text->id) }}" method="POST" style="display: inline;" onsubmit="return confirmarBorrado()">
				<input type="hidden" name="_method" value="DELETE">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Borrar</button>
			</form>
		</div>

	</h1>
@endsection

@section('content')
	@include('errors.error')
	
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">{{ $text->title }}</h3>
		</div>

		<div class="box-body no-padding">

			<form action="{{ route('admin.textos.update', $text->id) }}" method="POST">
				<div class="modal-body">


					<input type="hidden" name="_method" value="PUT">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					
					@if($rol=="admin")
						<div class="form-group @if($errors->has('title')) has-error @endif">
							<label for="title-field">Title</label>
							<input type="text" id="title-field" name="title" class="form-control" value="{{ $text->title }}"/>
							@if($errors->has("title"))
								<span class="help-block">{{ $errors->first("title") }}</span>
							@endif
						</div>
					@else
						<input type="hidden" id="title-field" name="title" value="{{ $text->title }}"/>
					@endif

					<div class="form-group @if($errors->has('text_category_id')) has-error @endif">
						<label for="body-field">Categoria</label>
						<div>		
						    @if ($text_categories->count())
								<select name="text_category_id">
	        						@foreach($text_categories as $categoria)					
		            					<option value="{{ $categoria->id }}" {{ $selected == $categoria->id ? 'selected="selected"' : '' }}>{{ $categoria->title }}</option>   
									@endforeach
								</select> 
							@endif
								
						</div>
						
					</div>

					<div class="form-group @if($errors->has('body')) has-error @endif">
						<label for="body-field">Body</label>
						<textarea class="form-control" id="body-field" rows="15" style="resize: vertical;" name="body">{{ $text->body }}</textarea>
							@if($errors->has("body"))
								<span class="help-block">{{ $errors->first("body") }}</span>
							@endif
					</div>

				</div>

				<div class="modal-footer">
					<a class="btn btn-default" href="{{ route('admin.textos.index') }}">Cancelar</a>
					<button type="submit" class="btn btn-primary" href="{{ route('admin.textos.index') }}">Guardar cambios</button>
				</div>
			</form>

		</div>
	</div>

@endsection
