@extends('admin::layouts.master')

@section('a-textos', 'class="active"')

@section('a-contenido', 'active')

@section('header')
	<h1><a class="btn btn-default btn-xs" href="{{ route('admin.textos.index') }}"><i class="fa fa-chevron-left"></i></a> Textos <small>{{ $text->title }}</small>
		
		<div class="pull-right">
			<form action="{{ route('admin.textos.destroy', $text->id) }}" method="POST" style="display: inline;" onsubmit="return confirmarBorrado();">
				<input type="hidden" name="_method" value="DELETE">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="pull-right">
					<a class="btn btn-xs btn-warning btn-group" role="group" href="{{ route('admin.textos.edit', $text->id) }}"><i class="fa fa-edit"></i> Editar</a>
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
				<dd>{{ $text->id }}</dd>			
				<dt>Titulo:</dt>
				<dd>{{ $text->title }}</dd>
				<dt>Categoria:</dt>
				<dd>{{ $text_category->title }}</dd>

				<dt>Cuerpo:</dt>
				<dd>{{$text->body}}</dd>

				<dt>Codigo:</dt>
				<dd>
					<pre class="pre-codigo">&#123;&#123; $categorias->texto('{{ $text_category->title }}','{{ $text->title }}') }}</pre>
					<pre class="pre-codigo">&#123;&#123; $textos->texto('{{ $text->title }}') }}</pre>
				</dd>

				<dt>Tablas:</dt>
				<dd>
					texts
					{!! showTable($tabla_1, $text) !!}

					texts_category
					{!! showTable($tabla_2, $text_category) !!}
					
				</dd>
			</dl>

		</div>
	</div>

@endsection
	
