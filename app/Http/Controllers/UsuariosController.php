<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{


    public function index()
    {
        $usuarios=User::orderBy('id','desc')->paginate(10);
        return view('usuarios.index',compact('usuarios'));
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=> 'required',
            'email'=> 'required',
            'tipo'=> 'required',
        ]);

        $usuario = new User();
        $usuario->name=$request->name;
        $usuario->email=$request->email;
        $usuario->tipo=$request->tipo;
        $usuario->password=bcrypt($request->password);
        if($usuario->save()){
            return redirect('/users')->with('success', 'Usuario creado exitosamente');
        }else{
            return back('/users')->with('error', 'Error al crear el usuario');
        }
    }
    public function edit($id)
    {
        $usuario = User::find($id);
        return view('usuarios.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $usuario = usuario::find($id);
        $usuario->name=$request->name;
        $usuario->email=$request->email;
        $usuario->tipo=$request->tipo;
        if($usuario->save()){
            return redirect('/users')->with('success', 'Usuario actualizado exitosamente');
        }else{
            return back('/users')->with('error', 'Error al actualizar el usuario');
        }
    }
}

