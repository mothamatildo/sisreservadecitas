<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secretaria extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombres',
        'apellidos',
        'cc',
        'celular',
        'fecha_nacimiento',
        'direccion',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}