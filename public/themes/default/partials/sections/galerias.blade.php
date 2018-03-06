<section id="galerias" class="galerias-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1>Galerias</h1>

				<div class="col-lg-6">
					<h4>Solo una galeria:</h4>
					<p>						
						@if(($album = $albumes->album('diseño')) !== 'null')
							@foreach($album->galerias as $galeria)
								<img src="{{ $galeria->vista }}"></a>
							@endforeach
						@endif
					</p>

				</div>

				<div class="col-lg-6">

					<h4>Galeria: </h4>
					<p>						
						@if(($album = $albumes->album('diseño')) !== 'null')
							<ul class="nav nav-tabs">
								@foreach($album->galerias as $galeria)
									<li><a href="#tab_{{ $galeria->id }}" data-toggle="tab">{{ $galeria->title }}</a></li>
								@endforeach
							</ul>
							<div class="tab-content">
								@foreach($album->galerias as $galeria)
									<div class="tab-pane" id="tab_{{ $galeria->id }}">
										@foreach($galeria->imagenes as $image)
											<span class="image_container">
												<a href="#"><img src="{{ URL::asset($image->thumb) }}"></a>
											</span>
										@endforeach

										<div class="after-box"></div>

									</div>
								@endforeach
							</div>
						@endif
					</p>
				</div>

				
			</div>
		</div>
	</div>
</section>