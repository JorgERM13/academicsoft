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
                        <li class="breadcrumb-item active"><a href="">Inicio</a></li>

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
                        <div class="col-6">
                            <a href="{{ url('/usuarios/actualizar') }} " class="btn btn-primary btn-sm">Actualizar</a>
                        </div>

                        <div class="col-6 text-end">

                        </div>
                    </div>

                    <div class="table-responsive mt-3">
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NOMBRE</th>
                                    <th>EMAIL</th>
                                    <th>TIPO</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usuarios as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->tipo }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $usuarios->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
