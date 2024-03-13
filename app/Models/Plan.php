<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cita;
class Plan extends Model
{
    use HasFactory;
    protected $table= ['planes'];

    protected $fillable=['nombre','precio','descripcion'];

    public function cliente()
    {
        return $this->hasMany(Cita::class,'user_id');
        
    }
}
