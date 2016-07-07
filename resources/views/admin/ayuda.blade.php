@extends('admin.layouts.master')

@section('a-ayuda', 'class="active"')

@section('header')
	<h1>Ayuda <small>Solicitud</small></h1>
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
					<form role="form">
						<div class="form-group">
							<label>Asunto:</label>
							<select class="form-control">
								<option>Soporte tecnico</option>
								<option>Sugerencia</option>
								<option>Emails</option>
								<option>Agregar contenido</option>
								<option>Otros</option>
							</select>
						</div>

						<div class="form-group">
							<label>Mensaje:</label>
							<textarea class="form-control" rows="4" placeholder="¿En que lo puedo ayudar?"></textarea>
						</div>


						<div class="form-group">
							<label>Responder a:</label>
							<input class="form-control" placeholder="Email" type="text" value="{{ $email }}">
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
