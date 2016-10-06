@extends('admin::layouts.master')

@section('a-faq', 'class="active"')

@section('a-contenido', 'active')

@section('header')
	<h1><a class="btn btn-default btn-xs" href="{{ route('admin.faq.index') }}"><i class="fa fa-chevron-left"></i></a> FAQ <small>{{ $faq->id }}</small>
		
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
			
			<dl class="dl-horizontal">
				<dt>Id:</dt>
				<dd>{{ $faq->id }}</dd>
				<dt>Categoria:</dt>
				<dd>{{ $faq_category->title }}</dd>
				<dt>Pregunta:</dt>
				<dd>{{ $faq->question }}</dd>
				<dt>Respuesta:</dt>
				<dd>{{ $faq->answer }}</dd>

				<dt>Codigo:</dt>
				<dd>
					<pre class="pre-codigo">&#123;&#123; $faq_categorias->texto('{{ $faq_category->title }}','{{ $faq->question }}') }}</pre>
					<pre class="pre-codigo">&#123;&#123; $faq->texto('{{ $faq->question }}') }}</pre>
				</dd>

				<dt>Tablas:</dt>
				<dd>
					faq
					{!! showTable($tabla_1, $faq) !!}

					faq_category
					{!! showTable($tabla_2, $faq_category) !!}
				</dd>




			</dl>


		</div>
	</div>

@endsection
	
