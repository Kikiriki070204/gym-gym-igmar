<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Servicio;
use App\Models\Cita;

class Empleado extends Model
{
    use HasFactory;
    protected $table = ['empleados'];

    protected $fillable =[
        'user_id',
        'servicio_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function servicio()
    {
        return $this->belongsTo(Servicio::class,'servicio_id');
    }
    public function cita()
    {
        return $this->hasMany(Cita::class,'empleado_id');
    }
}
