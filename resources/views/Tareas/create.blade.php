@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tareas</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Tareas</li>
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
                            <form action="{{ url('tareas/registrar') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="descripcion">Descripción</label>
                                    <input type="text" name="descripcion" value="{{ old('descripcion') }}"
                                        class="form-control">
                                    @error('descripcion')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="fechaEntrega">Fecha de Entrega</label>
                                    <input type="date" name="fechaEntrega" value="{{ old('fechaEntrega') }}"
                                        class="form-control">
                                    @error('fechaEntrega')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nota">Nota</label>
                                    <input type="text" name="nota" value="{{ old('nota') }}" class="form-control">
                                    @error('nota')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                        </div>

                        <div class="text-center mt-3 pb-2">
                            <button type="submit" class="btn btn-dark">Registrar</button>
                            <a href="{{ url('tareas') }}" class="btn btn-primary">Volver al listado</a>
                        </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
