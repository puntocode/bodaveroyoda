<?php

namespace App\Http\Controllers;

use App\Models\Invitados;
use Illuminate\Http\Request;

class InvitadosController extends Controller
{

    public function confirmarAsistencia(Request $request)
    {
        $invitado = Invitados::findOrFail($request->id);

        if($request->has('confirmar')) $invitado->asistencia = 'CONFIRMADA';
        else  $invitado->asistencia = 'NO CONFIRMADA';

        if($request->has('mensaje')) $invitado->mensaje = $request->mensaje;

        if($request->has('cancelar')) $invitado->asistencia = 'CANCELADA';

        $invitado->save();
        return response()->json($invitado);
    }

    public function buscarInvitado(Request $request)
    {
        $invitado = Invitados::where('codigo', $request->codigo)->firstOrFail();
        return response()->json($invitado);
    }


    public function getInvitados(){
        $invitados = Invitados::all();
        return response()->json($invitados);
    }



}
