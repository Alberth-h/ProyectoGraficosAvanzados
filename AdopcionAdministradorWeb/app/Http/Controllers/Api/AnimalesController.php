<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Animal;

class AnimalesController extends Controller
{
    public function index() {
        $animales = Animal::select('id', 'especie', 'edad', 'ubicacion')->get();
        return $animales;
    }

    public function show($id) {
        $animal = Animal::select('id', 'descripcion', 'foto')->where('id', $id)->first();
        return $animal;
    }
}
