@extends('admin::layouts.master')

@section('a-textos', 'class="active"')

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
		</div>
	</div>

@endsection
	
