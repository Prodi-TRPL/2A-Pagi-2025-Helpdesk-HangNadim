<?php

return [
    'attributes' => [
        'nama' => 'Name',
        'email' => 'Email',
        'whatsapp' => 'Whatsapp',
        'pekerjaan' => 'Profession',
        'umur' => 'Age',
        'gender' => 'Gender',
        'is_penumpang' => 'Passenger',
        'maskapai' => 'Airline',
        'no_penerbangan' => 'Flight Number',
        'message' => 'Message',
        'kategori_id' => 'Category',
        'bukti' => 'Proof',
    ],

    'required' => ':attribute is required.',
    'string' => ':attribute must be a string.',
    'integer' => ':attribute must be a number.',
    'email' => ':attribute must be a valid email address.',
    'in' => 'The selected :attribute is invalid.',
    'file' => ':attribute must be a file.',

    'custom' => [
        'whatsapp' => [
            'regex' => ':attribute must be numeric and 12 to 15 digits long.',
        ],
        'umur' => [
            'min' => ':attribute must be at least :min years old.',
            'max' => ':attribute may not be greater than :max years old.',
        ],
        'kategori_id' => [
            'exists' => 'The selected :attribute is invalid.',
        ],
        'bukti' => [
            'mimes' => ':attribute must be a file of type: jpg, jpeg, png, or pdf.',
            'max' => ':attribute may not be greater than 5MB.',
        ],
    ]
];
