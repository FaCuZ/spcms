@extends('admin::layouts.master')

@section('a-faq', 'class="active"')

@section('a-contenido', 'active')

@section('header')
	<h1>
		{!! button('back') !!} FAQ <small>Mostrar: {{ $faq->id }}</small>
		
		@if(Auth::user()->isAdmin)		
			<div class="pull-right">
				<a class="btn btn-xs btn-warning btn-group" role="group" href="{{ route('admin.faq.edit', $faq->id) }}"><i class="fa fa-edit"></i> Editar</a>
				<form action="{{ route('admin.faq.destroy', $faq->id) }}" method="POST" style="display: inline;" onsubmit="return confirmarBorrado();">
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
				<dd>{{ $faq->id }}</dd>
				<dt>Categoria:</dt>
				<dd>{{ $faq_category->title }}</dd>
				<dt>Pregunta:</dt>
				<dd>{{ $faq->question }}</dd>
				<dt>Respuesta:</dt>
				<dd>{{ $faq->answer }}</dd>
			</dl>

			@component('admin::partial.advance', ['data' => [$faq, $faq_category]])
				<dd>
					<pre class="pre-codigo">&#123;&#123; $faq_category->texto('{{ $faq_category->title }}','{{ $faq->question }}') }}</pre>
				</dd>
			@endcomponent

		</div>
	</div>

@endsection
	
