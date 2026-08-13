<?php 
 
namespace App\Models; 
 
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model; 
 
class Paciente extends Model 
{ 
    use HasFactory;

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }
}