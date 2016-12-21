
@extends('admin::layouts.master')

@section('a-paginas', 'class="active"')

@section('a-contenido', 'active')

@section('header')
	<h1>
		{!! button('faq') !!} Pagina <small>Edicion: {{ $pagina->title }}</small>
		
		@if(Auth::user()->isAdmin)								
			<div class="pull-right">
				<form action="{{ route('admin.paginas.destroy', $pagina->id) }}" method="POST" style="display: inline;" onsubmit="return confirmarBorrado()">
					<input type="hidden" name="_method" value="DELETE">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Borrar</button>
				</form>
			</div>
		@endif

	</h1>
@endsection

@section('content')
	@include('errors.error')
	
	<div class="box">
		<div class="box-body">

			<form action="{{ route('admin.paginas.update', $pagina->id) }}" method="POST">
				<div class="modal-body">
					<input type="hidden" name="_method" value="PUT">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					
					<div class="form-group @if($errors->has('title')) has-error @endif">
						<label for="title-field">Nombre</label>
						<input type="text" id="title-field" name="title" class="form-control" value="{{ $pagina->title }}"/>
						@if($errors->has("title"))
							<span class="help-block">{{ $errors->first("title") }}</span>
						@endif
					</div>
				
					<div class="form-group @if($errors->has('path')) has-error @endif">
						<label for="path-field">Ruta</label>
						<input type="text" id="path-field" name="path" class="form-control" value="{{ $pagina->path }}"/>
						@if($errors->has("path"))
							<span class="help-block">{{ $errors->first("path") }}</span>
						@endif
					</div>
				
					<div class="form-group @if($errors->has('order')) has-error @endif">
						<label for="order-field">Orden</label>
						<input type="number" id="order-field" name="order" class="form-control" value="{{ $pagina->order }}"/>
						@if($errors->has("order"))
							<span class="help-block">{{ $errors->first("order") }}</span>
						@endif
					</div>


				</div>

				<div class="modal-footer">
					<a class="btn btn-default" href="{{ route('admin.paginas.index') }}">Cancelar</a>
					<button type="submit" class="btn btn-primary" href="{{ route('admin.paginas.index') }}">Guardar cambios</button>
				</div>
			</form>

		</div>
	</div>

@endsection
