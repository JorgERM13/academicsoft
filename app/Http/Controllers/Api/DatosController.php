<?php

namespace App\Http\Controllers\Api;

use App\Models\Datos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DatosController extends Controller
{
    //
    public function index()
    {
        $datos=Datos::orderBy('id', 'DESC')->first();
        return response()->json([
            'empresa'=>$datos,
        ],200);

    }
}
