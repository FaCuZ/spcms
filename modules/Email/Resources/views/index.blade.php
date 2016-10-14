@extends('admin::layouts.master')

@section('a-email', 'class="active"')

@section('header')
	<h1>Emails <small>Configuracion</small></h1>
@endsection

@section('content')

	<div class="row">
		<div class="col-md-offset-3 col-md-6">

			<div class="box box-solid">
				<div class="box-header with-border text-center">
					<h3 class="box-title">Opciones</h3>
				</div>

				<div class="box-body">
					<p class="email-btns">	
						<a class="btn btn-default btn-lg" href="http://{{ env('CLIENT_WEBMAIL') }}" role="button"><i class="fa fa-envelope-o"></i> <span>Ingresar a Webmail</span></a>
						<br/>
						<a class="btn btn-default btn-lg open-dialog" href="#" data-titulo="Nueva cuenta de Email" data-accion="nueva" role="button"><i class="fa fa-plus"></i> <span>Nueva cuenta de Email</span></a>
						<br/>
						<a class="btn btn-default btn-lg open-dialog" href="#" data-titulo="Cambio de contraseña" data-accion="cambio" role="button"><i class="fa fa-key"></i> <span>Cambio de contraseña</span></a>
						<br/>
						<a class="btn btn-default btn-lg open-dialog" href="#" data-titulo="Borrar cuenta de Email" data-accion="borrar" role="button"><i class="fa fa-trash"></i> <span>Borrar cuenta de Email</span></a>
					</p>

				</div>
			</div>
		</div>
	</div>


	<div class="modal fade" id="emailModal" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">ble</h4>
				</div>
				<form role="form" action="{{ route('admin.email.send') }}" method="POST">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">					
					<input type="hidden" name="accion" id="hidden-accion" value="">
					<input type="hidden" name="asunto" id="hidden-asunto" value="">

					<div class="modal-body">


						<div class="form-group fl-cambio fl-nueva fl-borrar">
							<label>Email:</label>
							<input name="email" class="form-control" type="email">
						</div>

						<div class="form-group fl-cambio fl-nueva fl-borrar">
							<label>Contraseña:</label>
							<input name="password" class="form-control" type="password">
						</div>

						<div class="form-group fl-cambio">
							<label>Nueva contraseña:</label>
							<input name="new_password" class="form-control" type="password">
						</div>

						<div class="form-group">
							<label>Comentarios:</label>
							<textarea name="mensaje" class="form-control" rows="2" placeholder="Informacion extra a tener en cuenta para el administrador del sistema."></textarea>
						</div>



						<p class="text-center text-muted">Por seguridad estos cambios se realizaran en forma manual dentro de las 48hs.</p>
					</div>
					<div class="modal-footer">

						<a class="btn btn-default" href="{{ route('admin.email.index') }}">Cancelar</a>
						<button type="submit" class="btn btn-primary">Enviar</button>
					</div>
				</form>
			</div>
		</div>
	</div>

@endsection
		