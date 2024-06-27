@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Usuarios</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Usuarios</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            @include('includes.alertas')

                            <form action="{{ url('usuarios/registrar') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Nombre</label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" value="{{ old('email') }}" class="form-control">
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Contraseña</label>
                                    <input type="password" name="password" value="{{ old('password') }}"
                                        class="form-control">
                                    @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password-confirmation">Confirmar Contraseña</label>
                                    <input type="password" name="password-confirmation" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="tipo">Tipo</label>
                                    <select name="tipo" class="form-control">
                                        <option value="administrador">Administrador</option>
                                        <option value="estudiante">Estudiante</option>
                                    </select>
                                    @error('tipo')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="text-center mt-3 pb-2">
                                    <button type="submit" class="btn btn-dark">Registrar</button>
                                    <a href="{{ url('usuarios') }}" class="btn btn-primary">Volver al listado</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
