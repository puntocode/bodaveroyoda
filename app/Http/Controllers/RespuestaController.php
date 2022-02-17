<?php

namespace App\Http\Controllers;

use App\Models\Respuesta;
use Illuminate\Http\Request;

class RespuestaController extends Controller
{
    public function store(Request $request){
        $respuestas = Respuesta::create($this->validateData());
        return response()->json($respuestas);
    }

    public function getRespuestas(){
        $respuestas = Respuesta::orderBy('total', 'DESC')->orderBy('created_at')->get();
        return response()->json($respuestas);
    }

    public function validateData()
    {
        return request()->validate([
            'nombre' => 'required',
            'respuestas' => 'required',
            'correctas' => 'required',
            'total' => 'required',
        ]);
    }
}
