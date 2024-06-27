<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cursos;
use App\Models\Asignaciones;
use Illuminate\Http\Request;

class AsignacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $asignaciones = Asignaciones::all();
        return view('asignaciones.index', compact('asignaciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $usuarios=User::all();
        $cursos = Cursos::where('estado',true)->get();
        return view('asignaciones.create', compact('cursos','usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)

    {
        $this->validate($request,[
            'usuario_id' => 'required|exists:users,id',
            'curso_id' => 'required|exists:cursos,id',
            'fechaInicio' => 'required',
            'fechaFin' => 'required',
            'importe' => 'required',
            'estado' => 'nullable',
        ]);

        $asignacion = new Asignaciones();

        $asignacion->usuario_id =$request->usuario_id;
        $asignacion->curso_id = $request->curso_id;
        $asignacion->fechaInicio = $request->fechaInicio;
        $asignacion->fechaFin = $request->fechaFin;
        $asignacion->importe = $request->importe;
        $asignacion->estado = true;
        if ($asignacion->save()) {
            return redirect('/asignaciones')->with('success', 'Asignacion creada exitosamente');
        } else {
            return back()->with('error', 'Error al crear la asignacion');
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
        $usuarios=User::all();
        $cursos=Cursos::where('estado',true)->get();
        return view('asignaciones.edit', compact('asignacion','usuarios','cursos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate ([
            'usuario_id' => 'required|exists:users,id',
            'curso_id' => 'required|exists:cursos,id',
            'fechaInicio' => 'required',
            'fechaFin' => 'required',
            'importe' => 'required',
            'estado' => 'nullable',
        ]);
        $asignacion=Asignaciones::find($id);
        $asignacion->usuario_id = $request->usuario_id;
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
