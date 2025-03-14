<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'profesor_id',
        'max_alumnos'
    ];

    public function profesor()
    {
        return $this->belongsTo(Profesor::class);
    }

    public function alumnos()
    {
        return $this->belongsToMany(Alumno::class);
    }
}