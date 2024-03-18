<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class EmpleadoServicio extends Pivot
{
    use HasFactory;

    protected $table ='empleado_servicio';
    protected $fillable =['empleado_id','servicio_id'];
}
