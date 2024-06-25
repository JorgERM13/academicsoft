@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Cursos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Cursos</li>
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


                            <form action="{{ url('cursos/registrar') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" name="nombre" value="{{ old('nombre') }}" class="form-control">
                                    @error('nombre')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="imagen">Imagen</label>
                                    <input type="file" name="imagen" value="{{ old('imagen') }}" class="form-control">
                                    @error('imagen')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="costo">Costo</label>
                                    <input type="text" name="costo" value="{{ old('costo') }}" class="form-control">
                                    @error('costo')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="descripcion">Descripcion</label>
                                    <textarea class="form-control" name="descripcion" cols="30" rows="2">{{ old('descripcion') }}</textarea>
                                </div>
                                @error('descripcion')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                                <div class="text-center mt-3">
                                    <button type="submit" class="btn btn-dark">Registrar</button>
                                    <a href="{{ url('cursos') }}" class="btn btn-primary">Volver al listado</a>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
