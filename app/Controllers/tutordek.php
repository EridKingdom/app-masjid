<?php

namespace App\Controllers;

class Tutordek extends BaseController
{
    public function index()
    {
        // Menggabungkan data dalam satu array
        $data = [
            'title' => 'Panduan Donasi',
            'showSearch' => false
        ];

        // Mengirim data ke view
        return view('viewprofil/tutorbayar', $data);
    }
}
