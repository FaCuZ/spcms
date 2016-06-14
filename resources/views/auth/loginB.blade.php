<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>AdminLTE 2 | Log in</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.6 -->
	<!-- link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css" -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Theme style -->
	{{-- <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css"> --}}
	<script src="js/libs.js"></script>
	<!-- iCheck -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/blue.css">
	{{--<link rel="stylesheet" href="../../plugins/iCheck/square/blue.css"> --}}

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
	<div class="login-logo">
		<a href="../../index2.html"><b>Admin</b></a>
	</div>
	<!-- /.login-logo -->
	<div class="login-box-body">
		<p class="login-box-msg">Area protegida</p>

		<form action="../../index2.html" method="post">
			{{ csrf_field() }}

			<div class="form-group has-feedback">
				<input type="email" class="form-control" placeholder="Email">
				<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			</div>

			@if ($errors->has('email'))
				<span class="help-block">
					<strong>{{ $errors->first('email') }}</strong>
				</span>
			@endif

			<div class="form-group has-feedback">
				<input type="password" class="form-control" placeholder="Password">
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div>

			@if ($errors->has('password'))
				<span class="help-block">
					<strong>{{ $errors->first('password') }}</strong>
				</span>
			@endif

			<div class="row">
				<div class="col-xs-8">
					<div class="checkbox icheck">
						<label>
							<input type="checkbox"> Recordarme
						</label>
					</div>
				</div>
				<!-- /.col -->
				<div class="col-xs-4">
					<button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
				</div>
				<!-- /.col -->
			</div>
		</form>

		<a href="#">Olvide mi contraseña</a><br>
		<a href="register.html" class="text-center">Registrar nuevo miembro</a>

	</div>
	<!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.0 -->
{{-- script src="../../plugins/jQuery/jQuery-2.2.0.min.js"></script --}}
<script src="https://code.jquery.com/jquery-3.0.0.min.js"
		integrity="sha256-JmvOoLtYsmqlsWxa7mDSLMwa6dZ9rrIdtrrVYRnDRH0="
		crossorigin="anonymous"></script>
<!-- Bootstrap 3.3.6 -->
{{-- script src="../../bootstrap/js/bootstrap.min.js"></script --}}
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
		integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
		crossorigin="anonymous"></script>
<!-- iCheck -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
<script>
	$(function () {
		$('input').iCheck({
			checkboxClass: 'icheckbox_square-blue',
			radioClass: 'iradio_square-blue',
			increaseArea: '20%' // optional
		});
	});
</script>
</body>
</html>
