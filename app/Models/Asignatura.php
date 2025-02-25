<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion'
    ];

    public function profesores()
    {
        return $this->hasMany(Profesor::class);
    }

    public function proyectos()
    {
        return $this->hasMany(Proyecto::class);
    }   

    public function alumnos()
    {
        return $this->hasMany(Alumno::class);
    }   
}
