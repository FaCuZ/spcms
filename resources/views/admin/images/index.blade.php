@extends('admin.layouts.master')

@section('a-imagenes', 'class="active"')

@section('header')
		<h1>Imagenes <small>Lista</small>

			@if($rol=="admin")
				<div class="pull-right">
					<a class="btn btn-sm btn-success" href="{{ route('admin.albums.create') }}"><i class="fa fa-plus"></i> Nuevo album</a>
				</div>
			@endif
		</h1>
@endsection

@section('content')

	<div class="box box-solid">
		@if(!$albums->isEmpty())
			<div class="box-body">
				@foreach($albums as $album)
					<div class="album">
						

						<div class="nav-tabs-custom">

							<h4><strong>{{ $album->title }}</strong>
								@if($rol=="admin")
									<div class="pull-right">
										<a class="btn btn-xs btn-warning" href="{{ route('admin.albums.edit', $album->id) }}"><i class="fa fa-edit"></i> Editar</a>
										<a class="btn btn-xs btn-success" href="{{ route('admin.albums.index', ['album' => $album->id]) }}"><i class="fa fa-list"></i> Listar</a>
										<a class="btn btn-xs btn-primary" href="{{ route('admin.albums.show', $album->id) }}"><i class="fa fa-eye"></i> Ver</a>
										<form action="{{ route('admin.albums.destroy', $album->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Esta seguro que quiere borrarlo?')) { return true } else {return false };">
											<input type="hidden" name="_method" value="DELETE">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Borrar</button>
										</form>
									</div>
								@endif

							</h4>

							<ul class="nav nav-tabs">
								@foreach($album->galerias as $galeria)
									<li><a href="#tab_{{ $galeria->id }}" data-toggle="tab">{{ $galeria->title }}</a></li>
								@endforeach

								<li class="new"><a href="{{ route('admin.galerias.create', ['album' => $album->id]) }}"><i class="fa fa-plus"></i></a></li>

							</ul>
							<div class="tab-content">
								@foreach($album->galerias as $galeria)
									<div class="tab-pane" id="tab_{{ $galeria->id }}">
										@foreach($galeria->imagenes as $image)
											<span class="image_container">
												<a href="{{ route('admin.imagenes.show', $image->id) }}"><img src="{{ URL::asset($image->thumb) }}"></a>
											</span>

													{{-- 
											<br><div>
												<strong>{{$image->title}}</strong>:{{$image->description}}
												<span class="text-right nowrap">
													<a class="btn btn-xs btn-warning" href="{{ route('admin.imagenes.edit', $image->id) }}"><i class="fa fa-edit"></i> Editar</a>
														<a class="btn btn-xs btn-primary" href="{{ route('admin.imagenes.show', $image->id) }}"><i class="fa fa-eye"></i> Ver</a>
														<form action="{{ route('admin.imagenes.destroy', $image->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Esta seguro que quiere borrarlo?')) { return true } else {return false };">
															<input type="hidden" name="_method" value="DELETE">
															<input type="hidden" name="_token" value="{{ csrf_token() }}">
															<button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Borrar</button>
														</form>
												</span>
											</div>
													 --}}
										@endforeach
										<div class="new_image">
											<a href="{{ route('admin.imagenes.create', ['gallery' => $galeria->id]) }}"><i class="fa fa-plus"></i></a>
										</div>


										<div class="after-box"></div>

									</div>
								@endforeach

							</div>
						</div>
						
						


					</div>
				@endforeach
			</div>
		@else
			<p class="text-center">No hay albumes creados</p>
		@endif


	</div>


@endsection