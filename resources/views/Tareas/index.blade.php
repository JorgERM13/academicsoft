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

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">

                        </div>

                        <div class="col-md-6 text-end pb-2">
                            <a href="{{ url('tareas/registrar') }}" class="btn btn-primary">Nueva tarea</a>
                        </div>
                    </div>

                    @include('includes.alertas')



                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th>Asignación_ID</th>
                                    <th>Descripción</th>
                                    <th>Fecha de entrega</th>
                                    <th>Nota</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tareas as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->descripcion }}</td>
                                        <td>{{ $item->fechaEntrega }}</td>
                                        <td>{{ $item->nota }}</td>
                                        <td>
                                            <a href="{{ url('tareas/actualizar/' . $item->id) }}"
                                                class="btn btn-primary btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <a href="{{ url('tareas/eliminar/' . $item->id) }}"
                                                class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $tareas->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>




        </div>
    </div>
@endsection
