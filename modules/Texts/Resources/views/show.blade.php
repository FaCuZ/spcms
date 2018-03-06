@extends('admin::layouts.master')

@section('a-textos', 'class="active"')

@section('a-contenido', 'active')

@section('header')
	<h1>{!! button('back') !!} Textos <small>{{ $text->title }}</small>
		
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

	<div class="box box-solid">
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
			</dl>

			@component('admin::partial.advance', ['data' => [$text, $text_category]])
				<dd>
					<pre class="pre-codigo">&#64;text('{{ $text_category->title }}','{{ $text->title }}')</pre>
				</dd>
			@endcomponent

		</div>
	</div>

@endsection
	
