<?php

namespace App\Models;

use App\Models\User;
use App\Models\Cursos;
use App\Models\Asignaciones;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Asignaciones extends Model
{
    use HasFactory;

    protected $table = "asignaciones";

    protected $fillable = [
        'usuario_id',
        'curso_id',
        'fechaInicio',
        'fechaFin',
        'importe',
        'estado',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
    public function curso()
    {
        return $this->belongsTo(Cursos::class, 'curso_id');
    }

}
