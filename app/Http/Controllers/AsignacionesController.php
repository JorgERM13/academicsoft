<?php

namespace App\Http\Controllers;

use App\Models\Asignaciones;
use Illuminate\Http\Request;

class AsignacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $asignaciones = Asignaciones::orderBy('id', 'DESC')->paginate(10);
        return view('asignaciones.index', compact('asignaciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('asignaciones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)

    {
        $request->validate ([
            'user_id' => 'required|exists:users,id',
            'curso_id' => 'required|exists:cursos,id',
            'fechaInicio' => 'required',
            'fechaFin' => 'required',
            'importe' => 'required',

        ]);

        $asignacion = new Asignaciones();
        $asignacion->user_id = auth()->user()->id;
        $asignacion->curso_id = $request->curso_id;
        $asignacion->fechaInicio = $request->fechaInicio;
        $asignacion->fechaFin = $request->fechaFin;
        $asignacion->importe = $request->importe;
        $asigancion->estado = true;
        if ($asignacion->save()) {
            return redirect('/asignaciones')->with('success', 'Asignacion creada exitosamente');
        } else {
            return back('/asignaciones')->with('error', 'Error al crear la asignacion');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Asignaciones $asignaciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $asignacion = Asignaciones::find($id);
        return view('asignaciones.edit', compact('asignacion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate ([
            'user_id' => 'required|exists:users,id',
            'curso_id' => 'required|exists:cursos,id',
            'fechaInicio' => 'required',
            'fechaFin' => 'required',
            'importe' => 'required',
        ]);
        $asignacion =Asignaciones::find($id)();
        $asignacion->user_id = auth()->user()->id;
        $asignacion->curso_id = $request->curso_id;
        $asignacion->fechaInicio = $request->fechaInicio;
        $asignacion->fechaFin = $request->fechaFin;
        $asignacion->importe = $request->importe;
        $asignacion->estado = true;
        if ($asignacion->save()) {
            return redirect('/asignaciones')->with('success', 'Asignacion actualizada exitosamente');
        } else {
            return back('/asignaciones')->with('error', 'Error al alcualizar la asignacion');
        }
    }
    public function estado($id)
    {
        $asignacion=Asignaciones::find($id);
        $asignacion->estado = !$asignacion->estado;
        if($asignacion->save()){
            return redirect('/asignaciones')->with('success', 'Estado actualizado exitosamente');
        }else{
            return back()->with('error', 'El estado no fue actualizado');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asignaciones $asignaciones)
    {
        //
    }
}
