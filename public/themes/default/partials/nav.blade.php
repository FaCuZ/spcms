<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header page-scroll">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand page-scroll" href="#page-top">SinglePage CMS</a>
		</div>

		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav">

				<li class="hidden"><a class="page-scroll" href="#page-top"></a></li>

				<li><a class="page-scroll" href="#introduccion">Introduccion</a></li>

				<li><a class="page-scroll" href="#imagenes">Imagenes</a></li>

				<li><a class="page-scroll" href="#textos">Textos</a></li>

				<li><a class="page-scroll" href="#galerias">Galerias</a></li>
				
			</ul>

			<ul class="nav navbar-nav navbar-right">

				<li><a class="text-uppercase" href="{{ URL::route('admin.inicio') }}">Administrador</a></li>

			</ul>

		</div>
	</div>
</nav>