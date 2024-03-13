<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cita;
class Ficha_Nutri extends Model
{
    use HasFactory;

    protected $table = 'ficha_nutri';

    protected $fillable = [
        'cita_id',
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
        return $this->belongsTo(Cita::class, 'cita_id');
    }
}
