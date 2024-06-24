{{-- @extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg-light">
                    <div class="card-body">
                        @include('includes.alertas')

                        <form action="{{ url('/usuarios/registrar') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Nombre</label>
                                <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}">
                                @error('nombre')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Tipo</label>
                                <input type="text" name="tipo" class="form-control" value="{{ old('tipo') }}">
                                @error('tipo')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>
                            <div class="text-center">
                                <a href="{{ url('/usuarios') }} " class="btn btn-primary">Volver al listado</a>
                                <button type="submit" class="btn btn-success">Registrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}
