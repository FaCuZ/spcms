@extends('admin::layouts.master')

@section('a-links', 'class="active"')

@section('a-contenido', 'active')

@section('header')

	<h1>{!! button('back') !!} Link <small>{{ $link->title }}</small>
		
		<div class="pull-right">
			<form action="{{ route('admin.links.destroy', $link->id) }}" method="POST" style="display: inline;" onsubmit="return confirmarBorrado();">
				<input type="hidden" name="_method" value="DELETE">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="pull-right">
					<a class="btn btn-xs btn-warning btn-group" role="group" href="{{ route('admin.links.edit', $link->id) }}"><i class="fa fa-edit"></i> Editar</a>
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
				<dd>{{ $link->id }}</dd>			
				<dt>Titulo:</dt>
				<dd>{{ $link->title }}</dd>
				<dt>Categoria:</dt>
				<dd>{{ $link_category->title }}</dd>

				<dt>Url:</dt>
				<dd><a href="{{$link->url}}">{{$link->url}}</a></dd> 
			</dl>

			@component('admin::partial.advance', ['data' => [$link, $link_category]])
				<dd>
					<pre class="pre-codigo">&#123;&#123; &#64;links('{{ $link_category->title }}','{{ $link->title }}') }}</pre>
				</dd>
			@endcomponent


		</div>
	</div>

@endsection
	
