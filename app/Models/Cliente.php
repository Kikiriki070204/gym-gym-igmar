<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Plan;
use App\Models\Cita;
class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';

    protected $fillable =[
        'user_id',
        'plan_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function plan()
    {
        return $this->belongsTo(Plan::class,'plan_id');
    }
    public function cita()
    {
        return $this->hasMany(Cita::class,'cliente_id');
    }
}
