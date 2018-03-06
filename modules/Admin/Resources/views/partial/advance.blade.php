<div class="box-footer">
	<div class="text-center mostrar-avanzado-div">
		<a href="#" class="mostrar-avanzado">Mostrar detalles avanzados</a>
	</div>

	<dl class="hidden dl-horizontal mostrar-avanzado-dl">
		@if(Auth::user()->isAdmin)
			<dt>Codigo:</dt>
			{{ $slot }}

			<dt>Tablas:</dt>
			<dd>@each('admin::partial.table', $data, 'data')</dd>
		@endif

		<dt>Historial:</dt>
		<dd>@each('admin::partial.history', $data, 'data')</dd>

{{-- 
		@if(Auth::user()->isAdmin)
			<ul class="nav nav-tabs nav-justified">
				<li class="active"><a data-toggle="pill" href="#menu1">Codigo</a></li>
				<li><a data-toggle="pill" href="#menu2">Tablas</a></li>
				<li><a data-toggle="pill" href="#menu3">Historial</a></li>
			</ul>
			<br/>
			<div class="tab-content">
				<div id="menu1" class="tab-pane fade in active"">
					<dt>Codigo:</dt>
					{{ $slot }}
				</div>
				<div id="menu2" class="tab-pane fade">
					<dt>Tablas:</dt>
					<dd>@each('admin::partial.table', $data, 'data')</dd>
				</div>
				<div id="menu3" class="tab-pane fade">
					<dt>Historial:</dt>
					<dd>@each('admin::partial.history', $data, 'data')</dd>
				</div>
			</div>
		@else
			<dt>Historial:</dt>
			<dd>@each('admin::partial.history', $data, 'data')</dd>
		@endif
 --}}

	</dl>
</div>