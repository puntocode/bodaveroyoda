<?php

namespace App\Http\Controllers;

use App\Models\Canciones;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function sugerirCanciones(Request $request){
        $canciones = Canciones::create($this->validateData());
        return response()->json($canciones);
    }

    public function validateData()
    {
        return request()->validate([
            'nombre' => 'required',
            'canciones' => 'required',
        ]);
    }


}
