<div class="container">
    <form action="{{ url('/datos/registrar') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="">Administrador</label>
            <input type="text" name="administrador" class="form-control">
            @error('administrador')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Registrar</button>
    </form>
</div>
