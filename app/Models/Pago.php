<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    protected $table = 'pagos';

    protected $fillable = [
        'reserva_id',
        'valor',
        'metodo_pago',
        'fecha_pago',
        'estado',
        'observaciones',
    ];

    public function reserva()
    {
        return $this->belongsTo(Reserva::class);
    }
}