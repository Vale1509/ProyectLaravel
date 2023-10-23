<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class donaciones extends Model
{
    protected $table = 'donaciones'; // Nombre de la tabla en la base de datos
    protected $fillable = ['nombre', 'fecha', 'monto','metodo_donacion']; 
}
