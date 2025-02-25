<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido',
        'asignatura_id',
        'email',
        'telefono',
        'aula'
    ];

    public function asignatura()
    {
        return $this->belongsTo(Asignatura::class);
    }

    public function proyectos()
    {
        return $this->hasMany(Proyecto::class);
    }
}
