<?php

namespace App\Http\Controllers;

use App\Models\Preguntas;
use Illuminate\Http\Request;

class PreguntasController extends Controller
{
    public function getPreguntas(){
        $preguntas = Preguntas::all();
        return response()->json($preguntas);
    }
}
