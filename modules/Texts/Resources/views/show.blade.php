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
			
			<p><strong>Id:</strong> {{ $text->id }}</p>			
			<p><strong>Titulo:</strong> {{ $text->title }}</p>
			<p><strong>Categoria:</strong> {{ $text_category->title }}</p>

			<strong>Cuerpo:</strong>
			<p>{{$text->body}}</p>

			<p><strong>Codigo:</strong></p>
			<pre class="pre-codigo">&#123;&#123; $categorias->texto('{{ $text_category->title }}','{{ $text->title }}') }}</pre>
			<pre class="pre-codigo">&#123;&#123; $textos->texto('{{ $text->title }}') }}</pre>
		
			<p><strong>Tablas:</strong></p>
			<h5>texts</h5>
			<table class="tabla_ejemplo">
				@if(!empty($tabla_1))
					<tr>
						@foreach($tabla_1 as $col)
							<th>{{ $col }}</th>
						@endforeach
					</tr>
					<tr>
						@foreach($tabla_1 as $col)
							<td> {{ $text[$col] }} </td>
						@endforeach
					</tr>
				@endif
			</table> 	

			<h5>texts_category</h5>
			<table class="tabla_ejemplo">
				@if(!empty($tabla_2))
					<tr>
						@foreach($tabla_2 as $col)
							<th>{{ $col }}</th>
						@endforeach
					</tr>
					<tr>
						@foreach($tabla_2 as $col)
							<td> {{ $text_category[$col] }} </td>
						@endforeach
					</tr>
				@endif
			</table> 


		</div>
	</div>

@endsection
	
