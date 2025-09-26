<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;

abstract class Controller
{
    public function index()
    {
        $fakultas = Fakultas::all(); // select * from Fakultas
        return response() -> json($fakultas ,200);
    }
}
