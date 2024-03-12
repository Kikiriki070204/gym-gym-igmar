<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FichaNutri extends Model
{
    protected $table = 'ficha_nutri';

    protected $fillable = [
        'cita',
        'peso',
        'altura',
        'med_cintura',
        'med_cadera',
        'med_cuello',
        'porc_grasa_corporal',
        'masa_corp_magra',
        'objetivo',
        'observaciones',
        'motivo',
    ];

    public function cita()
    {
        return $this->belongsTo(Cita::class, 'cita', 'id');
    }
}
