<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asiganciones extends Model
{
    use HasFactory;
    protected $table='asignaciones';

    protected $fillable=[
       'usuario_id',
       'curso_id',
       'fechaInicio',
       'fechaFinalizacion',
       'importe',
    ];
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
    public function curso()
    {
        return $this->belongsTo(User::class, 'curso_id');
    }
    public function tarea()
    {
        return $this->hasOne(Horario::class, 'asignacion_id');
    }
}
