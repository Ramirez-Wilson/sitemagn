<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nomina extends Model
{
    use HasFactory;
    protected $table = 'nomina';

    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }

    public function planillaAguinaldo()
    {
        return $this->hasOne(PlanillaAguinaldo::class, 'nomina_id');
    }

    public function planillaBono14()
    {
        return $this->hasOne(PlanillaBono14::class, 'nomina_id');
    }

    public function polizaContable()
    {
        return $this->hasOne(PolizaContable::class, 'nomina_id');
    }


}
