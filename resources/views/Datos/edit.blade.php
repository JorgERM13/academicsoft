<div class="container">
    <form action="{{ url('/datos/actualizar') }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="">Administrador</label>
            <input type="text" name="administrador" class="form-control" value="{{ $datos->administrador }}">
            @error('administrador')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
    </form>
</div>
