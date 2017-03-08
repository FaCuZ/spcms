process.env.DISABLE_NOTIFIER = true;
var elixir = require('laravel-elixir');

elixir(function(mix) {

	mix.styles( [
				'./assets/css/bootstrap.min.css',
				'./assets/css/scrolling-nav.css'
				], './assets/dist/css/styles.css'
	);
	

	mix.scripts([
				'./assets/js/jquery.js',
				'./assets/js/bootstrap.min.js',
				'./assets/js/jquery.easing.min.js',
				'./assets/js/scrolling-nav.js'
				], './assets/dist/js/scripts.js'
	);

});
