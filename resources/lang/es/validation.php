<?php

return [
    

    'custom' => [
        'name' => [
            'required' => 'El nombre es requerido',
            'string' => 'El nombre debe ser una cadena de texto',
            'regex' => 'El nombre debe contener solo letras',
        ],
        'surname' => [
            'required' => 'El apellido es requerido',
            'string' => 'El apellido debe ser una cadena de texto',
            'regex' => 'El apellido debe contener solo letras',
        ],
        'birthday' => [
            'required' => 'La fecha de nacimiento es requerida',
        ],
        'adress' => [
            'required' => 'La dirección es requerida',
        ],
        'email' => [
            'required' => 'El email es requerido',
            'email' => 'El email no es válido',
        ],
        'phone' => [
            'required' => 'El teléfono es requerido',
            'regex' => 'El teléfono debe contener solo números',
            'string' => 'El teléfono debe ser una cadena de texto',
        ],
    ],

    
]; 