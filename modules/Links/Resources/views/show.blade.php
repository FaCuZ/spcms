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

			<div class="box-footer">
				<div class="text-center mostrar-avanzado-div">
					<a href="#" class="mostrar-avanzado">Mostrar detalles avanzados</a>
				</div>

				<dl class="hidden dl-horizontal mostrar-avanzado-dl">
					@if(Auth::user()->isAdmin)
						<dt>Codigo:</dt>
						<dd>
							<pre class="pre-codigo">&#123;&#123; &#64;links('{{ $link_category->title }}','{{ $link->title }}') }}</pre>
						</dd>

						<dt>Tablas:</dt>
						<dd>
							links:
							{!! showTable($tabla_1, $link) !!}

							links_category:
							{!! showTable($tabla_2, $link_category) !!}					
						</dd>
					@endif

					<dt>Historial:</dt>
					<dd>
						links:
						{!! showHistory($historial_1) !!}

						links_category:
						{!! showHistory($historial_2) !!}
					</dd>
				</dl>
			</div>
		</div>
	</div>

@endsection
	
