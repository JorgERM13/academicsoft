<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{


    public function index()
    {
        $usuarios=User::orderBy('id','DESC')->paginate(10);
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
            'email'=> 'required|email|unique:users',
            'tipo'=> 'required',
        ]);

        $usuario= new User();

        $usuario->name=$request->name;
        $usuario->email=$request->email;
        $usuario->tipo=$request->tipo;
        $usuario->password=bcrypt($request->password);
        if($usuario->save()){
            return redirect('/usuarios')->with('success', 'Usuario creado exitosamente');
        }else{
            return back()->with('error', 'Error al crear el usuario');
        }
    }
    public function edit($id)
    {
        $usuario = User::find($id);
        return view('usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, $id)

    {
        $this->validate($request, [
            'name'=> 'required',
            'email'=> 'required|email|unique:users,email,'.$id,
            'tipo'=> 'required',
        ]);
        $usuario = User::find($id);

        $usuario->name=$request->name;
        $usuario->email=$request->email;
        $usuario->tipo=$request->tipo;
        if($usuario->save()){
            return redirect('/usuarios')->with('success', 'Usuario actualizado exitosamente');
        }else{
            return back()->with('error', 'Error al actualizar el usuario');
        }
    }
}

