<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignaciones extends Model
{
    use HasFactory;

    protected $table = "asignaciones";

    protected $fillable = [
        'user_id',
        'curso_id',
        'fechaInicio',
        'fechaFin',
        'importe',
        'estado',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function curso()
    {
        return $this->belongTo(Cursos::class, 'curso_id');
    }

}
