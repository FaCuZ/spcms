@extends('admin::layouts.master')

@section('a-faq', 'class="active"')

@section('a-contenido', 'active')

@section('header')
	<h1>
		{!! button('back') !!} Categoria <small>{{ $faq_category->title }}</small>

		@if(Auth::user()->isAdmin)
			<div class="pull-right">
				<a class="btn btn-xs btn-warning btn-group" role="group" href="{{ route('admin.faq.categorias.edit', $faq_category->id) }}"><i class="fa fa-edit"></i> Editar</a>
				<form action="{{ route('admin.faq.categorias.destroy', $faq_category->id) }}" method="POST" style="display: inline;" onsubmit="return confirmarBorrado();">
					<input type="hidden" name="_method" value="DELETE">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Borrar</button>
				</form>
			</div>
		@endif
	</h1>
@endsection

@section('content')
	<div class="box box-solid">
		<div class="box-body">
			<dl class="dl-horizontal">
				<dt>Id:</dt>
				<dd>{{ $faq_category->id }}</dd>
				<dt>Nombre:</dt>
				<dd>{{ $faq_category->title }}</dd>
			</dl>
		</div>
	</div>
@endsection