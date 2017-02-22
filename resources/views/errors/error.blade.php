@if (count($errors) > 0)
	<div class="alert alert-danger alert-dismissible fade in">
		<button type="button" aria-hidden="true" class="close" data-dismiss="alert">	× </button>
		<strong><i class="fa-fw fa fa-times"></i> ¡Error!</strong> Hay un problema con tus datos.
		<ul>
			@foreach ($errors->all() as $error)
				<li><strong>{{ $error }}</strong></li>
			@endforeach
		</ul>
	</div>
@endif