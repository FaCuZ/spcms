<section id="textos" class="textos-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1>Textos</h1>
				<div class="col-lg-6">				
					<h4>Texto:</h4>
					<p>{{ $textos->texto('diseño', 'corto') }}</p>	
					<code>&lbrace;&lbrace; $textos->texto('diseño', 'corto') &rbrace;&rbrace;</code>
				</div>

				<div class="col-lg-6">

					<h4>Texto desde categorias:</h4>
					<p>@text('diseño', 'largo')</p>	
					<code>&#64;text('diseño', 'largo')</code>
				</div>
			</div>
		</div>
	</div>
</section>