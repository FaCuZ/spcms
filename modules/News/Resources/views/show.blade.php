@extends('admin::layouts.master')

@section('a-noticias', 'class="active"')

@section('a-contenido', 'active')

@section('header')
	<h1>{!! button('back') !!} Noticia <small>{{ $news->title }}</small>
		
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
				<dd>{{$news->body}}</dd>
			</dl>

			<div class="box-footer">
				<div class="text-center mostrar-avanzado-div">
					<a href="#" class="mostrar-avanzado">Mostrar detalles avanzados</a>
				</div>

				<dl class="hidden dl-horizontal mostrar-avanzado-dl">
					@if(Auth::user()->isAdmin)
						<dt>Codigo:</dt>
						<dd>
							<pre class="pre-codigo">&#123;&#123; $news->texto('{{ $news->title }}') }}</pre>
						</dd>

						<dt>Tablas:</dt>
						<dd>
							news:
							{!! showTable($tabla_1, $news) !!}
						</dd>
					@endif

					<dt>Historial:</dt>
					<dd>
						news:
						{!! showHistory($historial_1) !!}
					</dd>
				</dl>
			</div>
		</div>
	</div>

@endsection
	
