@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg-light">
                    <div class="card-body">
                        <form action="{{ url('/perfil/actualizar') }}" method="PUT">
                            @csrf
                            <div class="form-group">
                                <label for="">Nombre</label>
                                <input type="text" name="nombre" class="form-control" value="{{ auth()->user()->name }}">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control"
                                    value="{{ auth()->user()->email }}">
                            </div>
                            <div class="form-group">
                                <label for="">Tipo</label>
                                <input type="text" name="tipo" class="form-control" value="{{ old('tipo') }}">
                            </div>
                            <button type="submit" class="btn btn-success">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
