<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class perros extends Model
{
    protected $table = 'perros'; // Nombre de la tabla en la base de datos
    protected $fillable = ['nombre', 'fecha_nacimiento', 'sexo','raza', 'descripcion']; 

    public function registros() {
        return $this->hasMany(registros::class);
    }

}
