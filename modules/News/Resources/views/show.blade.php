@extends('admin::layouts.master')

@section('a-noticias', 'class="active"')

@section('a-contenido', 'active')

@section('header')
	<h1>{!! button('news') !!} Noticia <small>{{ $news->title }}</small>
		
		<div class="pull-right">
			<form action="{{ route('admin.noticias.destroy', $news->id) }}" method="POST" style="display: inline;" onsubmit="return confirmarBorrado();">
				<input type="hidden" name="_method" value="DELETE">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="pull-right">
					<a class="btn btn-xs btn-warning btn-group" role="group" href="{{ route('admin.noticias.edit', $news->id) }}"><i class="fa fa-edit"></i> Editar</a>
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
				<dd>{{ $news->id }}</dd>			
				<dt>Titulo:</dt>
				<dd>{{ $news->title }}</dd>				
				<dt>Cuerpo:</dt>
				<dd>{!! nl2br(e($news->body)) !!}</dd>
			</dl>


			@component('admin::partial.advance', ['data' => [$news, $news_category]])
				<dd>
					<pre class="pre-codigo">
&#64;foreach($noticias->take(4) as $noticia)	
  &lt;h4>&#123;&#123; $noticia->title }}&lt;/h4>
    &lt;p>
      &#123;&#123; mb_strimwidth($noticia->body, 0, 200, '...') }}
    &lt;/p>
  &lt;/div>
&#64;endforeach</pre>
				</dd>
			@endcomponent
		
			
		</div>
	</div>

@endsection
	
