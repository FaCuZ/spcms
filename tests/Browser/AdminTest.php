<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AdminTest extends DuskTestCase
{
	/**
	 * A Dusk test example.
	 *
	 * @return void
	 */
	public function testExample()
	{
		$this->browse(function ($browser, $browser2) {
			$browser->visit('/admin')
					->assertPathIs('/spcms/public/login')
					->assertSee('AdministradorWeb')
					->type('email', 'admin@test.com')
					->type('password', 'admin')
					->press('Ingresar')
					->assertPathIs('/spcms/public/admin')
					->assertSee('Bienvenido');

			$browser2->visit('/login')
					->assertSee('Administrador')
					->type('email', 'client@test.com')
					->type('password', 'client')
					->press('Ingresar')
					->assertPathIs('/spcms/public/admin')
					->assertSee('Bienvenido');
		});
	}
}
