<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cita;

class Ficha_Fisio extends Model
{
    use HasFactory;
    protected $table = 'ficha_fisio';

    protected $fillable = [
        'cita_id',
        'peso',
        'altura',
        'observaciones',
        'motivo',
    ];

    public function cita()
    {
        return $this->belongsTo(Cita::class, 'cita_id');
    }
}
