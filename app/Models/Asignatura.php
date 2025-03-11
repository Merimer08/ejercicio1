<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'codigo',
        'descripcion',
        'creditos'
    ];

    public function profesores()
    {
        return $this->hasMany(Profesor::class);
    }

    public function alumnos()
    {
        return $this->belongsToMany(Alumno::class, 'alumno_asignatura');
    }
}
