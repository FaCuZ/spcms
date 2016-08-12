@extends('admin::layouts.master')

@section('a-ayuda', 'class="active"')

@section('header')
	<h1>Soporte <small>Solicitud</small></h1>
@endsection


@section('content')

	<div class="row">
		<div class="col-md-offset-3 col-md-6">

			<div class="box box-solid">
				<div class="box-header with-border">
					<h3 class="box-title">Formulario de solicitud</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<form role="form" action="{{ route('admin.sendSoporte') }}" method="POST">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group">
							<label>Asunto:</label>
							<select name="asunto" class="form-control">
								<option>Soporte tecnico</option>
								<option>Agregar contenido</option>
								<option>Sugerencia</option>
								<option>Emails</option>
								<option>Ayuda</option>
								<option>Otros</option>
							</select>
						</div>

						<div class="form-group">
							<label>Mensaje:</label>
							<textarea name="mensaje" class="form-control" rows="4" placeholder="¿En que lo puedo ayudar?"></textarea>
						</div>


						<div class="form-group">
							<label>Responder a:</label>
							<input name="email" class="form-control" placeholder="Email" type="text" value="{{ $email }}">
						</div>
						<div class="pull-right">

							<a class="btn btn-default" href="{{ route('admin.inicio') }}">Cancelar</a>
							<button type="submit" class="btn btn-primary">Enviar</button>
						</div>

					</form>
				</div>
			</div>

		</div>
	</div>

@endsection
