<?php

namespace App\Models;

use App\Models\Asignaciones;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tareas extends Model
{
    use HasFactory;

    protected $table = "tareas";

    protected $fillable = [
        'asignacion_id',
        'descripcion',
        'fechaEntrega',
        'nota',
    ];


    public function asignacion()
    {
        return $this->belongsTo(Asignaciones::class, 'asignacion_id');
    }


}
