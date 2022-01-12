<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvitadosController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/canciones', [HomeController::class, 'sugerirCanciones'])->withoutMiddleware(['auth']);
Route::post('/buscar-invitado', [InvitadosController::class, 'buscarInvitado'])->withoutMiddleware(['auth']);
Route::post('/confirmar-asistencia', [InvitadosController::class, 'confirmarAsistencia'])->withoutMiddleware(['auth']);
Route::put('/confirmar-manual', [InvitadosController::class, 'confirmar'])->withoutMiddleware(['auth']);
Route::get('/get-canciones', [HomeController::class, 'getCanciones'])->withoutMiddleware(['auth']);
Route::get('/invitados', [InvitadosController::class, 'getInvitados'])->withoutMiddleware(['auth']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

