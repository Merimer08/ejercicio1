<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido',
        'edad',
        'direccion',
        'email',
        'asignatura_id',
    ];
    // Relación de un alumno con una asignatura
    public function asignatura()
    {
        return $this->belongsTo(Asignatura::class);
    }

}
