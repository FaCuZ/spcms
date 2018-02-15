<?php

return [
	'name' => 'Admin',

	// TODO: No lo hice funcionar todavia porque no funciona desde el contructor
	'history' => [
		'enable' => env('HISTORY', true),
		'limit' => env('HISTORY_LIMIT', 20),
    ],


];