<?php

namespace App\Http\Controllers;

use App\Models\Tareas;
use App\Models\Asignaciones;
use Illuminate\Http\Request;

class TareasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tareas= Tareas::with('asignacion')->orderBy('id', 'DESC')->paginate(10);
        return view('tareas.index',compact('tareas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $asignaciones=Asignaciones::all();
        return view('tareas.create',compact('asignaciones'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'descripcion'=> 'required',
            'fechaEntrega'=> 'required',
            'nota'=> 'required',
            'asignacion_id'=> 'required|exists:asignaciones,id',
        ]);

        $tarea= new Tareas();

        $tarea->descripcion=$request->descripcion;
        $tarea->fechaEntrega=$request->fechaEntrega;
        $tarea->nota=$request->nota;
        $tarea->asignacion_id=$request->asignacion_id;

        if($tarea->save()){
            return redirect('/tareas')->with('success', 'Tarea creada exitosamente');
        }else{
            return back()->with('error', 'Error al crear la tarea');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tarea= Tareas::find($id);
        $asignaciones=Asignaciones::all();
        return view('tareas.edit',compact('tarea','asignaciones'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'descripcion'=> 'required',
            'fechaEntrega'=> 'required',
            'nota'=> 'required',
            'asignacion_id'=> 'required|exists:asignaciones,id',
        ]);

        $tarea=Tareas::find($id );
        $tarea->descripcion=$request->descripcion;
        $tarea->fechaEntrega=$request->fechaEntrega;
        $tarea->nota=$request->nota;
        if($tarea->save()){
            return redirect('/tareas')->with('success', 'Tarea actualizada exitosamente');
        }else{
            return back('/tareas')->with('error', 'Error al actualizar la tarea');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tarea=Tareas::find($id);
        if($tarea->delete()){
            return redirect('/tareas')->with('success', 'Tarea eliminada exitosamente');
        }else{
            return back()->with('error', 'Error al eliminar la tarea');
        }
    }
}
