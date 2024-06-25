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
        <div class="container-fluid">

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">


                        </div>

                        <div class="col-md-6 text-end pb-2">
                            <a href="{{ url('asignaciones/registrar') }}" class="btn btn-primary">Nueva asignacion</a>
                        </div>
                    </div>

                    @include('includes.alertas')



                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Usuario</th>
                                    <th>Curso</th>
                                    <th>Fecha de inicio</th>
                                    <th>Fecha de finalización</th>
                                    <th>Importe</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($asignaciones as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->curso->nombre }}</td>
                                        <td>{{ $item->fechaInicio }}</td>
                                        <td>{{ $item->fechaFin }}</td>
                                        <td>{{ $item->importe }}</td>
                                @endforeach
                                <td>
                                    @if ($item->estado == true)
                                        <span class="badge bg-success">Activo</span>
                                    @else
                                        <span class="badge bg-danger">Inactivo</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url('asignaciones/actualizar/') }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @if ($item->estado == true)
                                        <a href="{{ url('asignaciones/estado/') }}" class="btn btn-danger btn-sm">
                                            <i class="fas fa-ban"></i>
                                        </a>
                                    @else
                                        <a href="{{ url('asignaciones/estado/') }}" class="btn btn-primary btn-sm">
                                            <i class="fas fa-check"></i>
                                        </a>
                                    @endif
                                </td>
                                </tr>

                            </tbody>
                        </table>
                        {{ $asignaciones->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
