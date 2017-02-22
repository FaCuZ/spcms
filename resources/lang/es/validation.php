<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| as the size rules. Feel free to tweak each of these messages here.
	|
	*/

	"accepted"         => "El campo :attribute debe ser aceptado.",
    "active_url"       => "El campo :attribute no es un URL válido.",
    "after"            => "El campo :attribute debe ser una fecha posterior a :date.",
    "alpha"            => "El campo :attribute solo debe contener letras.",
    "alpha_dash"       => "El campo :attribute solo debe contener letras, números y guiones.",
    "alpha_num"        => "El campo :attribute solo debe contener letras y números.",
    "array"            => "El campo :attribute debe ser un conjunto.",
    "before"           => "El campo :attribute debe ser una fecha anterior a :date.",
    "between"          => array(
        "numeric" => "El campo :attribute tiene que estar entre :min - :max.",
        "file"    => "El campo :attribute debe pesar entre :min - :max kilobytes.",
        "string"  => "El campo :attribute tiene que tener entre :min - :max caracteres.",
        "array"   => "El campo :attribute tiene que tener entre :min - :max ítems.",
        ),
    "boolean"          => "El campo :attribute debe tener un valor verdadero o falso.",
    "confirmed"        => "La confirmación de :attribute no coincide.",
    "date"             => "El campo :attribute no es una fecha válida.",
    "date_format"      => "El campo :attribute no corresponde al formato :format.",
    "different"        => "El campo :attribute y :other deben ser diferentes.",
    "digits"           => "El campo :attribute debe tener :digits dígitos.",
    "digits_between"   => "El campo :attribute debe tener entre :min y :max dígitos.",
    "email"            => "El campo :attribute no es un correo válido",
    "exists"           => "El campo :attribute es inválido.",
    "image"            => "El campo :attribute debe ser una imagen.",
    "in"               => "El campo :attribute es inválido.",
    "integer"          => "El campo :attribute debe ser un número entero.",
    "ip"               => "El campo :attribute debe ser una dirección IP válida.",
    "max"              => array(
        "numeric" => "El campo :attribute no debe ser mayor a :max.",
        "file"    => "El campo :attribute no debe ser mayor que :max kilobytes.",
        "string"  => "El campo :attribute no debe ser mayor que :max caracteres.",
        "array"   => "El campo :attribute no debe tener más de :max elementos.",
        ),
    "mimes"            => ":attribute debe ser un archivo con formato: :values.",
    "min"              => array(
        "numeric" => "El tamaño de :attribute debe ser de al menos :min.",
        "file"    => "El tamaño de :attribute debe ser de al menos :min kilobytes.",
        "string"  => "El campo :attribute debe contener al menos :min caracteres.",
        "array"   => "El campo :attribute debe tener al menos :min elementos.",
        ),
    "not_in"           => "El campo :attribute es inválido.",
    "numeric"          => "El campo :attribute debe ser numérico.",
    "regex"            => "El formato de :attribute es inválido.",
    "required"         => "El campo :attribute es obligatorio.",
    "required_if"      => "El campo :attribute es obligatorio cuando :other es :value.",
    "required_with"    => "El campo :attribute es obligatorio cuando :values está presente.",
    "required_with_all" => "El campo :attribute es obligatorio cuando :values está presente.",
    "required_without" => "El campo :attribute es obligatorio cuando :values no está presente.",
    "required_without_all" => "El campo :attribute es obligatorio cuando ninguno de :values estén presentes.",
    "same"             => ":attribute y :other deben coincidir.",
    "size"             => array(
        "numeric" => "El tamaño de :attribute debe ser :size.",
        "file"    => "El tamaño de :attribute debe ser :size kilobytes.",
        "string"  => "El campo :attribute debe contener :size caracteres.",
        "array"   => "El campo :attribute debe contener :size elementos.",
        ),
    "unique"           => "El campo :attribute ingresado ya existe",
    "url"              => "El formato :attribute es inválido.",
    "user"             => array(
        "no_access"    => "No tienes los suficientes permisos",
        "not_found"    => "Usuario no encontrado",
        ),
    "group"             => array(
        "no_access"    => "No tienes los suficientes permisos",
        "not_found"    => "Grupo no encontrado",
        ),


	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => array(
		'attribute-name' => array(
			'rule-name' => 'custom-message',
		),
	),

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => array(
		'username' => 'usuario',
		'password' => 'contraseña',
	),

);
