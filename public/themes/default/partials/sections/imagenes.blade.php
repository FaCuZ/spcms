@inject('imagenes',	 'Modules\Images\Models\Image')
@inject('albumes',	 'Modules\Images\Models\Album')

<section id="imagenes" class="imagenes-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1>Imagenes</h1>
	
	
				<div class="col-lg-6">
					<h4>Imagen:</h4>
					<p>
						<img src="{{ $albumes->imagen("diseño", "logos", "logo")->url }}" />
					</p>
					<code>&lbrace;&lbrace; $albumes->imagen("diseño", "logos", "logo")->url &rbrace;&rbrace;</code>
					
				</div>
				<div class="col-lg-6">
					<h4>Imagen no encontrada:</h4>
					<p>
						<img src="{{ $imagenes->imagen("no encontrada")->url }}" />
					</p>
					<code>&lbrace;&lbrace; $imagenes->imagen("no encontrada")->url &rbrace;&rbrace;</code>
				</div>
			</div>
		</div>
	</div>
</section>