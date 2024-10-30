<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class Login extends Authenticatable
{

    use Notifiable;

    protected $table = 'login'; // Define la tabla

    protected $primaryKey = 'empleado_id'; // Define la clave primaria

    //public $timestamps = false; // Si no estás utilizando timestamps en la tabla

    protected $fillable = ['empleado_id', 'username', 'password']; // Define los campos que se pueden rellenar

    // Define la relación con la tabla 'empleado'
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id');
    }

}
