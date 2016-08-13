@extends('admin::layouts.master')

@section('a-historial', 'class="active"')

@section('header')

	<h1>Administrador<small>Historial</small></h1>

@endsection


@section('content')

	<div class="box">
		@if($texts->count())
			<table class="table table-striped">
				<thead>
					<tr>
						<th colspan="5">
							<h4><strong>Textos:</strong></h4>
						</th>
					</tr>
					<tr>
						<th>Usuario</th>
						<th>Campo</th>
						<th>Valor</th>
						<th>Nuevo Valor</th>
						<th>Tiempo</th>
					</tr>
				</thead>

				<tbody>
					@foreach($texts as $text)
						@if($text->revisionHistory->count())	
							@foreach($text->revisionHistory as $history)
								<tr>
									<td>{{ $history->userResponsible()->name }}</td>
									<td>{{ $history->fieldName() }}</td>
									<td><code>{{ $history->oldValue() }}</code></td>
									<td><code>{{ $history->newValue() }}</code></td>
									<td>{{ $history->created_at->diffForHumans() }}</td>
								</tr>
							@endforeach
						@endif
					@endforeach
				</tbody>
			</table>
		@else
			<p class="text-center">Sin Datos</p>
		@endif
	</div>

	{{-- 
					@foreach($text->revisionHistory as $history)
						<p class="history">
							{{ $history->created_at->diffForHumans() }}, {{ $history->userResponsible()->name }} changed
							<strong>{{ $history->fieldName() }}</strong> from
							<code>{{ $history->oldValue() }}</code> to <code>{{ $history->newValue() }}</code>
						</p>
					@endforeach
					@endforeach
					@else
					<p class="text-center">Sin Datos</p>
					@endif
				</div>
					--}}
	{{-- 
			@if($text_categories->count())			
				<div class="box-body">

					@foreach($text_categories as $category)

						<table class="table table-striped">
							<thead><tr><th colspan="2" class="btns-padre">
									<h3> {{ $category->title }}:
										<div class="pull-right btns-nuevo-texto hidden">
											<a class="btn btn-xs btn-success pull-right" href="{{ route('admin.textos.create', ['selected' => $category->id]) }}"><i class="fa fa-plus"></i> Agregar texto</a>
										</div>
									</h3>
							</th></tr></thead>

							<tbody>
								@if($category->textos->count())		
										@foreach($category->textos as $text)
											<tr>
												<td class="nowrap"><strong>{{$text->title}}</strong></td>
												<td class="btns-padre">{{$text->body}}
													<div class="nowrap btns-opciones hidden">
														<a class="btn btn-xs btn-warning" href="{{ route('admin.textos.edit', $text->id) }}"><i class="fa fa-edit"></i> Editar</a>
														<a class="btn btn-xs btn-primary" href="{{ route('admin.textos.show', $text->id) }}"><i class="fa fa-eye"></i> Ver</a>
														<form action="{{ route('admin.textos.destroy', $text->id) }}" method="POST" style="display: inline;" onsubmit="return confirmarBorrado();">
															<input type="hidden" name="_method" value="DELETE">
															<input type="hidden" name="_token" value="{{ csrf_token() }}">
															<button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Borrar</button>
														</form>
													</div>
												</td>
											</tr>
										@endforeach

								@else
									<tr><th colspan="2" class="text-center">
										vacio
									</th></tr>
								@endif
							</tbody>
						</table>

					@endforeach

				</div>
			@else
				<p class="text-center">Sin Elementos</p>
			@endif

		</div>
		--}}

@endsection
