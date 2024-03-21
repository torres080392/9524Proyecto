<?php
namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
   

    use HasFactory;
    
    protected $guarded = [];

    // Definimos la relación entre las otras tablas con usuario

    public function estado()
    {
        // Cambiamos hasOne a belongsTo y definimos la clave foránea
        return $this->belongsTo(Estado::class, 'estado_id');
    }

    public function area()
    {
        // Cambiamos hasOne a belongsTo y definimos la clave foránea
        return $this->belongsTo(Area::class, 'area_id');
    }

    public function cargo()
    {
        // Cambiamos hasOne a belongsTo y definimos la clave foránea
        return $this->belongsTo(Cargo::class, 'cargo_id');
    }
}
