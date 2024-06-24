<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function index()
    {
        $usuarios = User::orderBy('id','ASC')->paginate(10);
        return view('usuarios.index', compact('usuarios'));
    }
    // public function store(Request $request)
    // {
    //     $request->validate([

    //         'tipo'=>'nullable',
    //     ]);

    //     $user=new User();
    //     $user->name=auth()->user()->name;
    //     $user->email=auth()->user()->email;
    //     $user->tipo='Estudiante';

    //     if($user->save()){
    //         return back()->with('success', 'Registro actualizado con éxito');
    //     }else{
    //         return back()->with('error', 'No se pudo actualizar el registro');
    //     }

    // }
    public function update(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'tipo'=>'nullable',
        ]);

        $user=User::find(auth()->user()->id);
        $user->name= $request->name;
        $user->email=$request->email;
        $user->tipo='Estudiante';

        if($user->save()){
            return back()->with('success', 'Registro actualizado con éxito');
        }else{
            return back()->with('error', 'No se pudo actualizar el registro');
        }
    }

}
