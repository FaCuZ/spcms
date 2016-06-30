@extends('admin.layouts.master')

@section('a-textos', 'class="active"')

@section('header')
		<h1>Textos <small>Lista</small></h1>
@endsection

@section('content')

	<div class="box">
		@if($texts->count())
			<div class="box-header">
				<h3 class="box-title">Textos de la web</h3>
				@if($rol=="admin")
					<a class="btn btn-sm btn-success pull-right" href="{{ route('admin.textos.create') }}"><i class="fa fa-plus"></i> Nuevo</a>
				@endif
			</div>

			<!-- /.box-header -->
			<div class="box-body no-padding">
				<table class="table table-striped">
					<tbody>

						@foreach($texts as $text)
							<tr>
								<td><strong>{{$text->title}}</strong></td>
								<td>{{$text->body}}</td>
								<td class="text-right nowrap">
									<a class="btn btn-xs btn-warning" href="{{ route('admin.textos.edit', $text->id) }}"><i class="fa fa-edit"></i> Editar</a>
									@if($rol=="admin")
										<a class="btn btn-xs btn-primary" href="{{ route('admin.textos.show', $text->id) }}"><i class="fa fa-eye"></i> Ver</a>
										<form action="{{ route('admin.textos.destroy', $text->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Esta seguro que quiere borrarlo?')) { return true } else {return false };">
											<input type="hidden" name="_method" value="DELETE">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Borrar</button>
										</form>
									@endif
								</td>
							</tr>
						@endforeach

					</tbody>
				</table>
			</div><!-- /.box-body -->
		@else
			<p class="text-center">Sin Elementos</p>
			@if($rol=="admin")
				<a class="btn btn-sm btn-success pull-right" href="{{ route('admin.textos.create') }}"><i class="fa fa-plus"></i> Nuevo</a>
			@endif
		@endif
	</div><!-- /.box -->

@endsection
		