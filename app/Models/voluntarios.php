<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class voluntarios extends Model
{
    protected $table = 'voluntarios'; // Nombre de la tabla en la base de datos
    protected $fillable = ['nombre', 'dui', 'telefono','correo']; 
}
