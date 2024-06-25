<?php

namespace App\Http\Controllers;

use App\Models\Cursos;
use Illuminate\Http\Request;

class CursosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $cursos=Cursos::orderBy('id','desc')->paginate(10);
        return view('cursos.index',compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cursos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|unique:cursos',
            'descripcion' => 'required',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg',
            'costo' => 'required',
        ]);

        if($request->file('imagen')){
            $imagen=$request->file('imagen');
            $nombreImagen=uniqid('curso_') . 'png';

            if(!is_dir(public_path('/imagenes/cursos/'))){
                File::makeDirectory(public_path('/imagenes/cursos/'), 0777, true);
            }
            $subido= $imagen->move(public_path().'/imagenes/cursos/', $nombreImagen);
        }else{
            $nombreImagen='default.png';
        }

        $curso=new Cursos();
        $curso->nombre=$request->nombre;
        $curso->imagen=$nombreImagen;
        $curso->descripcion=$request->descripcion;
        $curso->costo=$request->costo;
        $curso->estado=true;
        if($curso->save()){
            return redirect('/cursos')->with('success', 'Curso creado exitosamente');
        }else{
            return back()->with('error', 'El curso no fue creado');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Cursos $cursos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $curso= Cursos::find($id);
        return view('cursos.edit',compact('curso'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'nombre' => 'required|unique:cursos,nombre,'.$id,
            'descripcion' => 'required',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg',
            'costo' => 'required',
        ]);

        $curso=Cursos::find($id);


        if($request->file('imagen')){

            if($curso->imagen !='default.png'){

                if(file_exists(public_path().'/imagenes/cursos/'.$curso->imagen)){
                    unlink(public_path().'/imagenes/cursos/'.$curso->imagen);
                }
            }

            $imagen=$request->file('imagen');
            $nombreImagen=uniqid('curso_') . 'png';

            if(!is_dir(public_path('/imagenes/cursos/'))){
                File::makeDirectory(public_path('/imagenes/cursos/'), 0777, true);
            }
            $subido= $imagen->move(public_path().'/imagenes/cursos/', $nombreImagen);
            $curso->imagen=$nombreImagen;
        }

        $curso->nombre=$request->nombre;
        $curso->estado=true;
        $curso->descripcion=$request->descripcion;
        $curso->costo=$request->costo;

        if($curso->save()){
            return redirect('/cursos')->with('success', 'Curso actualizado exitosamente');
        }else{
            return back()->with('error', 'El curso no fue actualizado');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function estado($id)
    {
        $curso=Cursos::find($id);
        $curso->estado = !$curso->estado;
        if($curso->save()){
            return redirect('/cursos')->with('success', 'Estado actualizado exitosamente');
        }else{
            return back()->with('error', 'El estado no fue actualizado');
        }

    }
}
