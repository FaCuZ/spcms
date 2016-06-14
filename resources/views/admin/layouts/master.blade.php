<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Administrador</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

  <link rel="stylesheet" href="{{ URL::asset('css/libs.css') }}">



  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

	<!-- Logo -->
	<a href="index2.html" class="logo">
	  <!-- mini logo for sidebar mini 50x50 pixels -->
	  <span class="logo-mini"><b>A</b>dm</span>
	  <!-- logo for regular state and mobile devices -->
	  <span class="logo-lg"><b>Administrador</b></span>
	</a>

	<!-- Header Navbar -->
	<nav class="navbar navbar-static-top" role="navigation">
	  <!-- Sidebar toggle button-->
	  <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
		<span class="sr-only">Toggle navigation</span>
	  </a>
	  <!-- Navbar Right Menu -->
	  <div class="navbar-custom-menu">
		<ul class="nav navbar-nav">

		  <!-- Notifications Menu -->
		  <li class="dropdown notifications-menu">
			<!-- Menu toggle button -->
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
			  <i class="fa fa-bell-o"></i>
			  <span class="label label-warning">10</span>
			</a>
			<ul class="dropdown-menu">
			  <li class="header">You have 10 notifications</li>
			  <li>
				<!-- Inner Menu: contains the notifications -->
				<ul class="menu">
				  <li><!-- start notification -->
					<a href="#">
					  <i class="fa fa-users text-aqua"></i> 5 new members joined today
					</a>
				  </li>
				  <!-- end notification -->
				</ul>
			  </li>
			  <li class="footer"><a href="#">View all</a></li>
			</ul>
		  </li>
		  
		  {{--
		  <li>
			<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
		  </li>
		  --}}
		</ul>
	  </div>
	</nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">

		<!-- Sidebar Menu -->
		<ul class="sidebar-menu">
			<li class="header">MENU</li>
			<li @yield('a-inicio')><a href="{{ URL::to('/admin') }}"><i class="fa fa-cube"></i> <span>Inicio</span></a></li>
			<li @yield('a-textos')><a href="{{ URL::to('/admin/textos') }}"><i class="fa fa-file-text-o"></i> <span>Textos</span></a></li>
			<li @yield('a-imagenes')><a href="{{ URL::to('/admin/imagenes') }}"><i class="fa fa-image"></i> <span>Imagenes</span></a></li>
			<li @yield('a-emails')><a href="{{ URL::to('/admin/emails') }}"><i class="fa fa-envelope"></i> <span>Emails</span></a></li>
			<li @yield('a-ayuda')><a href="{{ URL::to('/admin/ayuda') }}"><i class="fa fa-info-circle"></i> <span>Ayuda</span></a></li>
		</ul>
		<!-- /.sidebar-menu -->
	</section>
	<!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	
	@yield('content')

  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
	<!-- To the right -->
	<div class="pull-right hidden-xs">
	  info&#64;indis.com.ar
	</div>
	<!-- Default to the left -->
	<strong>Copyright &copy; 2016 <a href="http://www.indis.com.ar">Indis</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
	<!-- Create the tabs -->
	<ul class="nav nav-tabs nav-justified control-sidebar-tabs">
	  <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
	  <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
	</ul>
	<!-- Tab panes -->
	<div class="tab-content">
	  <!-- Home tab content -->
	  <div class="tab-pane active" id="control-sidebar-home-tab">
		<h3 class="control-sidebar-heading">Recent Activity</h3>
		<ul class="control-sidebar-menu">
		  <li>
			<a href="javascript::;">
			  <i class="menu-icon fa fa-birthday-cake bg-red"></i>

			  <div class="menu-info">
				<h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

				<p>Will be 23 on April 24th</p>
			  </div>
			</a>
		  </li>
		</ul>
		<!-- /.control-sidebar-menu -->

		<h3 class="control-sidebar-heading">Tasks Progress</h3>
		<ul class="control-sidebar-menu">
		  <li>
			<a href="javascript::;">
			  <h4 class="control-sidebar-subheading">
				Custom Template Design
				<span class="label label-danger pull-right">70%</span>
			  </h4>

			  <div class="progress progress-xxs">
				<div class="progress-bar progress-bar-danger" style="width: 70%"></div>
			  </div>
			</a>
		  </li>
		</ul>
		<!-- /.control-sidebar-menu -->

	  </div>
	  <!-- /.tab-pane -->
	  <!-- Stats tab content -->
	  <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
	  <!-- /.tab-pane -->
	  <!-- Settings tab content -->
	  <div class="tab-pane" id="control-sidebar-settings-tab">
		<form method="post">
		  <h3 class="control-sidebar-heading">General Settings</h3>

		  <div class="form-group">
			<label class="control-sidebar-subheading">
			  Report panel usage
			  <input type="checkbox" class="pull-right" checked>
			</label>

			<p>
			  Some information about this general settings option
			</p>
		  </div>
		  <!-- /.form-group -->
		</form>
	  </div>
	  <!-- /.tab-pane -->
	</div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
	   immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<script src="{{ URL::asset('js/libs.js') }}"></script>

{{-- Optionally, you can add Slimscroll and FastClick plugins.
	 Both of these plugins are recommended to enhance the
	 user experience. Slimscroll is required when using the
	 fixed layout. --}}
</body>
</html>
