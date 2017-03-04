<?php namespace Modules\Install\Console;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

use Artisan, File;

class SpcmsInstall extends Command
{
	 /**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	 protected $signature = 'spcms:deploy {--shared}';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Deploy SPCMS.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	protected $exec = [
		"htaccess" => [
			"command"	=> 'cp shared.htaccess .htaccess',
			"info" 		=> 'El archivo .htaccess fue creado.', 
			"error" 	=> 'No se pudo crear el archivo .htaccess'
		],
		"env" => [
			"command"	=> 'cp .env.production.example .env',
			"info" 		=> 'El archivo .env fue creado.', 
			"error" 	=> 'No se pudo crear el archivo .env'
		],
		"rm" => [
			"command"	=> 'rm .env',
			"info" 		=> 'El archivo .env fue borrado.', 
			"error" 	=> 'No se pudo borrar el archivo .env'
		],
		"uploads" => [
			"command"	=> 'mkdir public/images/uploads',
			"info" 		=> 'La carpeta uploads fue creada.', 
			"error" 	=> 'No se pudo crear la carpeta uploads'
		]
	];


	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		$this->info("Instalado SPCMS: ");

		if($this->option('shared')){
			$this->runProcess($this->exec["htaccess"]);
		}
		
		if (File::exists('.env')){			
			if($this->confirm('El archivo .env ya existe ¿Desea borrarlo?')) {
				$this->runProcess($this->exec["rm"]);
			} else {
				$this->error('[ERROR] No se puede continuar sin eliminar .env antes.');
				return null;
			}

			$this->error('[ATENCION] Debera ejecutar manualmente: $php artisan key:generate');	

		} else {			
			$this->runProcess($this->exec["env"]);
			
			Artisan::call('key:generate');
			$this->comment(Artisan::output());
		}

		
		if ($this->confirm('¿Desea configurar la base de datos?')) {
			$this->editEnv('DATABASE');
			$this->editEnv('USERNAME');
			$this->editEnv('PASSWORD');

			$this->info("[INFO] Base de datos configurada.");

			if ($this->confirm('¿Desea migrar la base de datos?')) {
				Artisan::call('migrate:install');
				Artisan::call('migrate:refresh', ['--seed' => true]);
			}
		}

		if(File::exists('public/images/uploadss')){
			$this->runProcess($this->exec["uploads"]);
		} else {
			$this->comment("[INFO] El directorio ./public/images/uploadss ya existe.");
		}
		
		$this->runProcessShow('composer install');
		
		$this->runProcessShow('composer dump-autoload --optimize');

	}
	
	/**
	 * Edita un valor dentro del .env
	 *
	 * @return void
	 */
	private function editEnv($value){

		$res = $this->ask($value);

		$data = [
			"command"=> "sed -i 's/\[".$value."\]/".$res."/g' .env",
			"error"  => "[ERROR] No se pudo modificar de .env la opcion ".$value
		];

		$this->runProcess($data);
	
	}

	/**
	 * Ejecuta un proceso
	 *
	 * @return void
	 */
	private function runProcess($data){
		try {
			$process = new Process($data["command"]);			
			$process->mustRun();
			
			if(isset($data["info"])) $this->info("[INFO] ".$data["info"]);
		} catch (ProcessFailedException $e) {
			echo $e->getMessage();
			$this->error("[ERROR] ".$data["error"]);
		}
	}

	/**
	 * Ejecuta un proceso mostrando la informacion
	 *
	 * @return void
	 */
	private function runProcessShow($data){
		$process = new Process($data);
		$process->run(function ($type, $buffer) {
			if (Process::ERR === $type) {
				echo $buffer;
			} else {
				echo $buffer;
			}
		});
	}

}
