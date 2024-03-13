<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Empleado;
use App\Models\Cita;

class Servicio extends Model
{
    use HasFactory;
    protected $table= ['servicios'];

    protected $fillable=['nombre'];

    public function empleado()
    {
        return $this->hasMany(Empleado::class,'servicio_id');
    }
    public function cita()
    {
        return $this->hasMany(Cita::class,'servicio_id');
    }
}
