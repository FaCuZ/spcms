<ul class="sidebar-menu">
	{{-- <li class="header">MENU</li> --}}

	<li @yield('a-inicio')>  
		<a href="{{ URL::route('admin.inicio') }}">
			<i class="fa fa-cube"></i> <span>Inicio</span>
		</a>
	</li>


	<li class="treeview @yield('a-contenido')">
		<a href="#">
			<i class="fa fa-archive"></i> <span>Contenido</span>
			<i class="fa fa-angle-left pull-right"></i>
		</a>
		<ul class="treeview-menu">
			@if(Module::active('News'))
				<li @yield('a-noticias')> 
					<a href="{{ URL::route('admin.noticias.index') }}">
						<i class="fa fa-newspaper-o"></i> <span>Noticias</span>
					</a>
				</li>
			@endif

			@if(Module::active('Texts'))
				<li @yield('a-textos')> 
					<a href="{{ URL::route('admin.textos.index') }}">
						<i class="fa fa-file-text-o"></i> <span>Textos</span>
					</a>
				</li>
			@endif

			@if(Module::active('Images'))
				<li @yield('a-imagenes')>
					<a href="{{ URL::route('admin.imagenes.index') }}">
						<i class="fa fa-image"></i> <span>Imágenes</span>
					</a>
				</li>
			@endif

			@if(Module::active('Links'))
				<li @yield('a-links')> 
					<a href="{{ URL::route('admin.links.index') }}">
						<i class="fa fa-link"></i> <span>Links</span>
					</a>
				</li>
			@endif

			@if(Module::active('Faq'))
				<li @yield('a-faq')>
					<a href="{{ URL::route('admin.faq.index') }}">
						<i class="fa fa-question-circle"></i> <span>FAQ</span>
					</a>
				</li>
			@endif
		</ul>
	</li>


	@if(Module::active('Email'))
		<li @yield('a-email')>  
			<a href="{{ URL::route('admin.email.index') }}">
				<i class="fa fa-envelope"></i> <span>Emails</span>
			</a>
		</li>
	@endif
	
	@if(Module::active('Support'))
		<li @yield('a-soporte')>   
			<a href="{{ URL::route('admin.soporte.index') }}">
				<i class="fa fa-info-circle"></i> <span>Soporte</span>
			</a>
		</li>
	@endif


	@if(Auth::user()->isAdmin)
		<li class="header">ADMINISTRADOR</li>
{{-- 
		<li @yield('a-temas')>   
			<a href="{{ URL::route('admin.temas.index') }}">
				<i class="fa fa-paint-brush"></i> <span>Temas</span>
			</a>
		</li>

 --}}

		@if(Module::active('Pages'))
			<li @yield('a-paginas')> 
				<a href="{{ URL::route('admin.paginas.index') }}">
					<i class="fa fa-files-o"></i> <span>Paginas</span>
				</a>
			</li>
		@endif
		<li @yield('a-usuarios')>   
			<a href="{{ URL::route('admin.usuarios') }}">
				<i class="fa fa-users"></i> <span>Usuarios</span>
			</a>
		</li>

		<li @yield('a-modulos')>   
			<a href="{{ URL::route('admin.modulos') }}">
				<i class="fa fa-cubes"></i> <span>Modulos</span>
			</a>
		</li>

		<li @yield('a-historial')>   
			<a href="{{ URL::route('admin.historial') }}">
				<i class="fa fa-history"></i> <span>Historial</span>
			</a>
		</li>
	@endif

</ul>

<div class="app-version">
	{{ GitVersionHelper::getVersion() }}
</div>
