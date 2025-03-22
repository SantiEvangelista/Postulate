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
            'date' => 'La fecha de nacimiento no es válida',
        ],
        'adress' => [
            'required' => 'La dirección es requerida',
            'string' => 'La dirección debe ser una cadena de texto',
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
        'secundario' => [
            'required' => 'El nombre del instituto secundario es requerido',
            'string' => 'El nombre del instituto debe ser una cadena de texto',
        ],
        'orientacion' => [
            'required' => 'La orientación es requerida',
            'string' => 'La orientación debe ser una cadena de texto',
        ],
        'fecha_inicio_secundario' => [
            'required' => 'La fecha de inicio es requerida',
            'date' => 'La fecha de inicio no es válida',
        ],
        'terciaria' => [
            'required' => 'El nombre de la institución terciaria es requerido',
            'string' => 'El nombre de la institución debe ser una cadena de texto',
        ],
        'orientacion_terciaria' => [
            'required' => 'La carrera es requerida',
            'string' => 'La carrera debe ser una cadena de texto',
        ],
        'fecha_inicio_terciaria' => [
            'required' => 'La fecha de inicio es requerida',
            'date' => 'La fecha de inicio no es válida',
        ],
        'objetivo_profesional' => [
            'required' => 'El objetivo profesional es requerido',
            'string' => 'El objetivo profesional debe ser una cadena de texto',
        ],
        'datos_interes' => [
            'required' => 'Los datos de interés son requeridos',
            'string' => 'Los datos de interés deben ser una cadena de texto',
        ],
        'lenguajes' => [
            'required' => 'Debe seleccionar al menos un idioma',
        ],
        'lenguajes.*.nombre' => [
            'required' => 'El idioma es requerido',
            'string' => 'El idioma debe ser una cadena de texto',
        ],
        'otros_estudios' => [
            'required' => 'Debe seleccionar al menos un estudio adicional',
        ],
        'otros_estudios.*.nombre' => [
            'required' => 'El estudio es requerido',
            'string' => 'El estudio debe ser una cadena de texto',
        ],
        'rasgos' => [
            'required' => 'Debe seleccionar al menos un rasgo de personalidad',
        ],
        'rasgos.*.nombre' => [
            'required' => 'El rasgo es requerido',
            'string' => 'El rasgo debe ser una cadena de texto',
        ],
        'addMoreInputFields.*.nombre' => [
            'required' => 'El nombre de la empresa es requerido',
            'string' => 'El nombre de la empresa debe ser una cadena de texto',
        ],
        'addMoreInputFields.*.cargo' => [
            'required' => 'El cargo es requerido',
            'string' => 'El cargo debe ser una cadena de texto',
        ],
        'addMoreInputFields.*.fecha_inicio' => [
            'required' => 'La fecha de inicio es requerida',
            'date' => 'La fecha de inicio no es válida',
        ],
        'addMoreInputFields.*.fecha_fin' => [
            'date' => 'La fecha de fin no es válida',
        ],
    ],

    
]; 