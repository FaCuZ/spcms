<a href="{{ URL::route('admin.inicio') }}" class="logo">

	<span class="logo-mini"><b>A</b>dm</span>

	<span class="logo-lg"><b>Administrador</b></span>
</a>

<nav class="navbar navbar-static-top" role="navigation">

	<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
		<span class="sr-only">Conmutador</span>
	</a>

	<div class="navbar-custom-menu">
		<ul class="nav navbar-nav">
			<li>
				<a href="{{ URL::to('logout') }}"><i class="fa fa-sign-out"></i></a>
			</li>
		</ul>
	</div>
</nav>