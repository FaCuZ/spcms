process.env.DISABLE_NOTIFIER = true;
var elixir = require('laravel-elixir');

var app_name = process.env.INIT_CWD.split("/")[4];

elixir(function(mix) {
	/*
	 *	Pagina Offline
	 */

	mix.sass('offline.scss');

	/*
	 *	Sistema de administracion
	 */
	mix.sass('admin.scss');

	mix.styles( [
				'./node_modules/admin-lte/bootstrap/css/bootstrap.min.css',
				'./node_modules/admin-lte/dist/css/AdminLTE.min.css',
				'./node_modules/admin-lte/plugins/iCheck/square/blue.css',
				'./node_modules/admin-lte/dist/css/skins/skin-blue.min.css'
				
				], 'public/css/admin-libs.css'
	);
	

	mix.scripts([
				'./node_modules/admin-lte/plugins/jQuery/jquery-2.2.3.min.js',
				'./node_modules/admin-lte/bootstrap/js/bootstrap.min.js',
				'./node_modules/admin-lte/plugins/iCheck/icheck.min.js',
				'./node_modules/admin-lte/dist/js/app.min.js',
				'./resources/assets/js/admin.js'
				
				], 'public/js/admin-libs.js'
	);


	mix.browserSync({
		files: [
			   'app/**/*',
			   'public/**/*',
			   'resources/views/**/*'	

			   ],
			   proxy: 'localhost/'+ app_name +'/public/',
			   browser: '/opt/firefox_dev/firefox',
			   ws: true,
	});

});
