<?php

namespace App\Http\Controllers;

use App\Models\Datos;
use Illuminate\Http\Request;

class DatosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos=Datos::orderBy('id','desc')->first();

        if($datos){
            return view('datos.edit',compact('datos'));
        }else{
            return view('datos.create');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'administrador'=>'required',
        ]);

        $datos=new Datos();
        $datos->administrador=$request->administrador;
        if($datos->save()){
            return redirect('/usuarios')->with('success','Registro creado con exito');
        }else{
            return back()->with('error','No se pudo crear el registro');
        };
    }

    /**
     * Display the specified resource.
     */
    public function show(Datos $datos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Datos $datos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        {
            $this->validate($request,[
                'administrador'=>'required',
            ]);

            $datos=Datos::first();
            $datos->administrador=$request->administrador;
            if($datos->save()){
                return redirect('/datos')->with('success','Registro actualizado con exito');
            }else{
                return back()->with('error','No se pudo actualizar el registro');
            };
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Datos $datos)
    {
        //
    }
}
