<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
   /* public $timestamps = false;*/

    // Definir el nombre de la tabla si no sigue las convenciones de Laravel
    protected $table = 'empleado';

    // Permitir los campos que se pueden rellenar masivamente
    protected $fillable = ['nombre', 'apellido', 'fecha_contratacion'];
}
