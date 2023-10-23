<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class adoptantes extends Model
{
    protected $table = 'adoptantes'; // Nombre de la tabla en la base de datos
    protected $fillable = ['nombre', 'dui', 'telefono','correo']; 

    public function registros() {
        return $this->hasMany(registros::class);
    }
}
