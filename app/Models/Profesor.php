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
        'telefono',
        'asignatura_id'
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
