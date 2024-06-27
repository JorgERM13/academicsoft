@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Crear Asignaciones</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Asignaciones</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card-body">

                    <form action=" {{ url('/asignaciones/actualizar/' . $asignacion->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="usuario_id">Usuario</label>
                            <select name="usuario_id" id="usuario_id" class="form-control">
                                <option value="">Seleccione...</option>
                                @foreach ($usuarios as $usuario)
                                    <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                                @endforeach
                            </select>
                            @error('usuario_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="curso_id">Cursos</label>
                            <select name="curso_id" id="curso_id" class="form-control">
                                <option value="">Seleccione...</option>
                                @foreach ($cursos as $curs)
                                    <option value="{{ $curs->id }}">{{ $curs->nombre }}</option>
                                @endforeach
                            </select>
                            @error('curso_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="fechaInicio">Fecha de inicio</label>
                            <input type="date" name="fechaInicio" value="{{ old('fechaInicio') }}" class="form-control">
                            @error('fechaInicio')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="fechaFin">Fecha de finalización</label>
                            <input type="date" name="fechaFin" value="{{ old('fechaFin') }}" class="form-control">
                            @error('fechaFin')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="importe">Importe</label>
                            <input type="text" name="importe" value="{{ old('importe') }}" class="form-control">
                            @error('importe')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="text-center">
                            <a href="{{ url('/asignaciones') }}" class="btn btn-primary">Volver al listado</a>
                            <button type="submit" class="btn btn-success">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
