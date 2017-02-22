@extends('admin::layouts.master')

@section('a-faq', 'class="active"')

@section('a-contenido', 'active')

@section('header')
	<h1>{!! button('back') !!} faq <small>Nuevo</small></h1>
@endsection

@section('content')
	<div class="box">
		<div class="box-body no-padding">
			@if($faq_categories->count())

				<form action="{{ route('admin.faq.store') }}" method="POST">
					<div class="modal-body">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group @if($errors->has('question')) has-error @endif">
							<label for="question-field">Pregunta</label>
							<input type="text" id="question-field" name="question" class="form-control" value="{{ old("question") }}"/>
							@if($errors->has("question"))
								<span class="help-block">{{ $errors->first("question") }}</span>
							@endif
						</div>

						<div class="form-group @if($errors->has('faq_category_id')) has-error @endif">
							<label for="body-field">Categoria</label>
							<div>								
								<select name="faq_category_id">
									@foreach($faq_categories as $categoria)					
										<option value="{{ $categoria->id }}" {{ $selected == $categoria->id ? 'selected="selected"' : '' }}>{{ $categoria->title }}</option>   
									@endforeach
								</select> 
							</div>

						</div>

						<div class="form-group @if($errors->has('answer')) has-error @endif">
							<label for="answer-field">Respuesta</label>
							<textarea class="form-control" id="answer-field" rows="15" name="answer">{{ old("answer") }}</textarea>
							@if($errors->has("answer"))
								<span class="help-block">{{ $errors->first("answer") }}</span>
							@endif
						</div>
					</div>

					<div class="modal-footer">
						<a class="btn btn-default" href="{{ route('admin.faq.index') }}">Cancelar</a>
						<button type="submit" class="btn btn-primary">Crear</button>
					</div>
				</form>

			@else
				Error: No se puede crear sin categorias
			@endif
		</div>
	</div>
@endsection
