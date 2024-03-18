<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Empleado;
use App\Models\Cita;

class Servicio extends Model
{
    use HasFactory;
    protected $table= 'servicios';

    protected $fillable=['nombre'];
    public function cita()
    {
        return $this->hasMany(Cita::class,'servicio_id');
    }

    public function empleados()
    {
        return $this->belongsToMany(Empleado::class,'empleado_servicio');
    }
}
