<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;
use App\Models\Servicio;
use App\Models\Empleado;
use App\Models\Ficha_Fisio;
use App\Models\Ficha_Nutri;
class Cita extends Model
{
    use HasFactory;

    protected $table = ['citas'];
    protected $fillable = ['
    cliente_id',
    'servicio_id',
    'empleado_id'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class,'cliente_id');
    }
    public function servicio()
    {
        return $this->belongsTo(Servicio::class,'servicio_id');
    }
    public function empleado()
    {
        return $this->belongsTo(Empleado::class,'empleado_id');
    }

    public function ficha_fisio()
    {
        return $this->hasMany(Ficha_Fisio::class,'cita_id');
    }
    public function ficha_nutri()
    {
        return $this->hasMany(Ficha_Nutri::class,'cita_id');
    }
}
