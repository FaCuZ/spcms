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

			<div class="box-footer">
				<div class="text-center mostrar-avanzado-div">
					<a href="javascript:void(0)" class="mostrar-avanzado">Mostrar detalles avanzados</a>
				</div>

				<dl class="hidden dl-horizontal mostrar-avanzado-dl">
					@if(Auth::user()->isAdmin)
						<dt>Codigo:</dt>
						<dd>
							<pre class="pre-codigo">&#123;&#123; $faq_categorias->texto('{{ $faq_category->title }}','{{ $faq->question }}') }}</pre>
							<pre class="pre-codigo">&#123;&#123; $faq->texto('{{ $faq->question }}') }}</pre>
						</dd>

						<dt>Tablas:</dt>
						<dd>
							faq:
							{!! showTable($tabla_1, $faq) !!}

							faq_category:
							{!! showTable($tabla_2, $faq_category) !!}
						</dd>
					@endif

					<dt>Historial:</dt>
					<dd>
						faq:
						{!! showHistory($historial_1) !!}

						faq_category:
						{!! showHistory($historial_2) !!}					
					</dd>

				</dl>
			</div>


		</div>
	</div>

@endsection
	
