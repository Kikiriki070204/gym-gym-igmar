<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FichaFisio extends Model
{
    protected $table = 'ficha_fisio';

    protected $fillable = [
        'cita',
        'peso',
        'altura',
        'observaciones',
        'motivo',
    ];

    public function cita()
    {
        return $this->belongsTo(Cita::class, 'cita', 'id');
    }
}
