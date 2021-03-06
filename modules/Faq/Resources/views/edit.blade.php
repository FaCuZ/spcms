
@extends('admin::layouts.master')

@section('a-faq', 'class="active"')

@section('a-contenido', 'active')

@section('header')
	<h1>
		{!! button('faq') !!} Faq <small>Edicion: {{ $faq->question }}</small>
		
		@if(Auth::user()->isAdmin)								
			<div class="pull-right">
				<form action="{{ route('admin.faq.destroy', $faq->id) }}" method="POST" style="display: inline;" onsubmit="return confirmarBorrado()">
					<input type="hidden" name="_method" value="DELETE">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Borrar</button>
				</form>
			</div>
		@endif

	</h1>
@endsection

@section('content')
	<div class="box">
		<div class="box-body">

			<form action="{{ route('admin.faq.update', $faq->id) }}" method="POST">
				<div class="modal-body">
					<input type="hidden" name="_method" value="PUT">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					
					<div class="form-group @if($errors->has('question')) has-error @endif">
						<label for="question-field">Pregunta</label>
						<input type="text" id="question-field" name="question" class="form-control" value="{{ $faq->question }}"/>
						@if($errors->has("question"))
							<span class="help-block">{{ $errors->first("question") }}</span>
						@endif
					</div>

					<div class="form-group @if($errors->has('faq_category_id')) has-error @endif">
						<label for="body-field">Categoria</label>
						<div>		
							@if ($faq_categories->count())
								<select name="faq_category_id">
									@foreach($faq_categories as $categoria)					
										<option value="{{ $categoria->id }}" {{ $selected == $categoria->id ? 'selected="selected"' : '' }}>{{ $categoria->title }}</option>   
									@endforeach
								</select> 
							@endif
								
						</div>
						
					</div>

					<div class="form-group @if($errors->has('answer')) has-error @endif">
						<label for="answer-field">Texto</label>
						<textarea class="form-control" id="answer-field" rows="15" style="resize: vertical;" name="answer">{{ $faq->answer }}</textarea>
							@if($errors->has("answer"))
								<span class="help-block">{{ $errors->first("answer") }}</span>
							@endif
					</div>

				</div>

				<div class="modal-footer">
					<a class="btn btn-default" href="{{ route('admin.faq.index') }}">Cancelar</a>
					<button type="submit" class="btn btn-primary" href="{{ route('admin.faq.index') }}">Guardar cambios</button>
				</div>
			</form>

		</div>
	</div>

@endsection
