<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Gimnasio extends Model
{
    use HasFactory;

    protected $table= 'gimnasios';

    protected $fillable=['nombre','ubicacion'];
    
    public function rol()
    {
        return $this->hasMany(User::class,'gimnasio_id');
    }
}
