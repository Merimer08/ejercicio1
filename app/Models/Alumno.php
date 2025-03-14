<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory; /* estos son los permitidos y solo estos cambos importante el atributo filable */

    protected $fillable = [
        'nombre',
        'apellido',
        'edad',
        'direccion',
        'email',
        'fecha_nacimiento'
    ];

    public function proyectos()
    {
        return $this->hasMany(Proyecto::class);
    }

    public function asignaturas()
    {
        return $this->belongsToMany(Asignatura::class);
    }
}
