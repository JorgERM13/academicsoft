@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Asignaciones</h1>
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


    <div class="content">
        <form action="{{ url('/asignaciones/registrar') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container-fluid">
                @include('includes.alertas')
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card m-1">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="usuario_id">Usuarios</label>
                                    <select name="usuario_id" id="usuario_id" class="form-control">
                                        <option value="">Seleccione...</option>
                                        {{-- @foreach ($usuarios as $cliente)
                                            <option value="{{ $cliente->id }}"
                                                @if ($cliente->id == old('usuario_id')) selected @endif>{{ $cliente->nombre }}
                                            </option>
                                        @endforeach --}}
                                    </select>
                                    @error('usuario_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="curso_id">Cursos</label>
                                    <select name="curso_id" id="curso_id" class="form-control">
                                        <option value="">Seleccione...</option>
                                        {{-- @foreach ($cursos as $cur)
                                            <option value="{{ $cur->id }}"
                                                @if ($cur->id == old('curso_id')) selected @endif>{{ $cur->nombre }}
                                            </option>
                                        @endforeach --}}
                                    </select>
                                    @error('curso_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <label for="tarea">Tarea</label>
                                <select name="tarea" class="form-control">
                                    <option value="">Seleccione...</option>
                                </select>
                                @error('tarea')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                                <div class="card m-1">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="fechaInicio">Fecha inicio</label>
                                            <input type="datetime-local" name= "fechaInicio"value="{{ old('fechaInicio') }}"
                                                class="form-control">
                                            @error('fechaInicio')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="fechaFinalizacion">Fecha Finalizacion</label>
                                            <input type="datetime-local"
                                                name= "fechaFinalizacion"value="{{ old('fechaFinalizacion') }}"
                                                class="form-control">
                                            @error('fechaFinalizacion')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group mt-4">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" name="estado" class="custom-control-input"
                                                    id="customSwitch1">
                                                <label class="custom-control-label" for="customSwitch1">Asignar ?</label>
                                                @error('estado')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror

                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <a href="{{ url('/posts') }}" class="btn btn-primary">Volver al listado</a>
                                            <button type="submit" class="btn btn-success">Registrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </form>
    </div>
@endsection

@section('scripts')
@endsection
