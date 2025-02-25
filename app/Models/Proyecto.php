<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'fecha_inicio',
        'fecha_fin',
        'profesor_id'
    ];

    protected $casts = [
        'fecha_inicio' => 'date',
        'fecha_fin' => 'date'
    ];
    public function alumnos()
    {
        return $this->hasMany(Alumno::class);
    }

    public function asignatura()
    {
        return $this->belongsTo(Asignatura::class);
    }
 
}
