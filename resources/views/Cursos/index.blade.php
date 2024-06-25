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

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">

                        </div>

                        <div class="col-md-6 text-end pb-2">
                            <a href="{{ url('cursos/registrar') }}" class="btn btn-primary">Nuevo curso</a>
                        </div>
                    </div>

                    @include('includes.alertas')



                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Imagen</th>
                                    <th>Descripcion</th>
                                    <th>Costo</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cursos as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->nombre }}</td>
                                        <td class="text-center">
                                            <img src="{{ $item->getImagenUrl() }}" alt="" class="border"
                                                height="50px">
                                        </td>
                                        <td>{{ $item->descripcion }}</td>
                                        <td>{{ $item->costo }}</td>
                                        <td>
                                            @if ($item->estado == true)
                                                <span class="badge bg-success">Activo</span>
                                            @else
                                                <span class="badge bg-danger">Inactivo</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('cursos/actualizar/' . $item->id) }}"
                                                class="btn btn-primary btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            @if ($item->estado == true)
                                                <a href="{{ url('cursos/estado/' . $item->id) }}"
                                                    class="btn btn-danger btn-sm">
                                                    <i class="fas fa-ban"></i>
                                                </a>
                                            @else
                                                <a href="{{ url('cursos/estado/' . $item->id) }}"
                                                    class="btn btn-primary btn-sm">
                                                    <i class="fas fa-check"></i>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $cursos->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>




        </div>
    </div>
@endsection
