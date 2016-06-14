var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
	mix.sass('app.scss');

	
	mix.styles([
			"./node_modules/admin-lte/dist/css/AdminLTE.min.css",
			"./node_modules/admin-lte/dist/css/skins/skin-blue.min.css"
		], 'public/css/libs.css');
	

	mix.browserSync({
		files: [
			   'app/**/*',
			   'public/**/*',
			   'resources/views/**/*'
		   ],
		   proxy: 'localhost/spcms/public/',
		   browser: '/opt/firefox_dev/firefox',
		   ws: true,
	});


});
