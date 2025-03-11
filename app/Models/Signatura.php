<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Signatura extends Model
{
    use HasFactory;

    protected $fillable = [
        'profesor_id',
        'imagen_firma',
        'descripcion'
    ];

    public function profesor()
    {
        return $this->belongsTo(Profesor::class);
    }
}