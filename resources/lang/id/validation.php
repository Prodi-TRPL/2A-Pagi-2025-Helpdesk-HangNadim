<?php

return [
    'attributes' => [
        'nama' => 'Nama',
        'email' => 'Email',
        'whatsapp' => 'Whatsapp',
        'pekerjaan' => 'Pekerjaan',
        'umur' => 'Umur',
        'gender' => 'Jenis Kelamin',
        'is_penumpang' => 'Penumpang',
        'maskapai' => 'Maskapai',
        'no_penerbangan' => 'Nomor Penerbangan',
        'message' => 'Pesan',
        'kategori_id' => 'Kategori',
        'bukti' => 'Bukti',
    ],

    'required' => ':attribute wajib diisi.',
    'string' => ':attribute harus berupa teks.',
    'integer' => ':attribute harus berupa angka.',
    'email' => ':attribute harus berupa email yang valid.',
    'in' => ':attribute tidak valid.',
    'file' => ':attribute harus berupa file.',

    'custom' => [
        'whatsapp' => [
            'regex' => 'Format :attribute harus berupa angka dan terdiri dari 12 sampai 15 digit.',
        ],
        'umur' => [
            'min' => ':attribute minimal :min tahun.',
            'max' => ':attribute maksimal :max tahun.',
        ],
        'kategori_id' => [
            'exists' => ':attribute tidak valid.',
        ],
        'bukti' => [
            'mimes' => ':attribute harus berupa file dengan format: jpg, jpeg, png, atau pdf.',
            'max' => 'Ukuran maksimum :attribute adalah 5MB.',
        ],
    ]
];
