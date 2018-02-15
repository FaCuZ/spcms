@extends('admin::layouts.master')

@section('a-noticias', 'class="active"')

@section('a-contenido', 'active')

@section('header')
	<h1>{!! button('back') !!} Noticia <small>Nueva</small></h1>
@endsection

@section('content')
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

					<div class="form-group @if($errors->has('news_category_id')) has-error @endif">
						<label for="body-field">Categoria</label>
						<div>								
							@if($news_categories->count())
								<select name="news_category_id">
									@foreach($news_categories as $categoria)					
										<option value="{{ $categoria->id }}" {{ $selected == $categoria->id ? 'selected="selected"' : '' }}>{{ $categoria->title }}</option>   
									@endforeach
								</select> 
							@endif
						</div>
					</div>

					<div class="form-group @if($errors->has('important')) has-error @endif">
						<input type="checkbox" id="important-field" name="important" value="1"  @if (old('important') == 1) checked @endif/>
						<label for="important-field">Marcar como importante</label>
						@if($errors->has("important"))
							<span class="help-block">{{ $errors->first("important") }}</span>
						@endif
					</div>

					<div class="form-group @if($errors->has('body')) has-error @endif">
						<label for="body-field">Cuerpo</label>
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