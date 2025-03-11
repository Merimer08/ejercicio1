<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    use HasFactory;

    protected $table = 'profesores';

    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'especialidad',
        'telefono'
    ];

    public function proyectos()
    {
        return $this->hasMany(Proyecto::class);
    }

    public function asignaturas()
    {
        return $this->hasMany(Asignatura::class);
    }

    public function signatura()
    {
        return $this->hasOne(Signatura::class);
    }
}
