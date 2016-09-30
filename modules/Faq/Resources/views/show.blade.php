@extends('admin::layouts.master')

@section('a-faq', 'class="active"')

@section('a-contenido', 'active')

@section('header')
	<h1><a class="btn btn-default btn-xs" href="{{ route('admin.faq.index') }}"><i class="fa fa-chevron-left"></i></a> faq <small>{{ $faq->question }}</small>
		
		<div class="pull-right">
			<form action="{{ route('admin.faq.destroy', $faq->id) }}" method="POST" style="display: inline;" onsubmit="return confirmarBorrado();">
				<input type="hidden" name="_method" value="DELETE">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="pull-right">
					<a class="btn btn-xs btn-warning btn-group" role="group" href="{{ route('admin.faq.edit', $faq->id) }}"><i class="fa fa-edit"></i> Editar</a>
					<button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Borrar</button>
				</div>
			</form>
		</div>	
	</h1>
@endsection

@section('content')

	<div class="box">
		<div class="box-body">
			
			<p><strong>Id:</strong> {{ $faq->id }}</p>			
			<p><strong>Categoria:</strong> {{ $faq_category->title }}</p>
			<p><strong>Pregunta:</strong> {{ $faq->question }}</p>
			<strong>Respuesta:</strong>
			<p>{{$faq->answer}}</p>

			<p><strong>Codigo:</strong></p>
			<pre class="pre-codigo">&#123;&#123; $faq_categorias->texto('{{ $faq_category->title }}','{{ $faq->question }}') }}</pre>
			<pre class="pre-codigo">&#123;&#123; $faq->texto('{{ $faq->question }}') }}</pre>
		</div>
	</div>

@endsection
	
