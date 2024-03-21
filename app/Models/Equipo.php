<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $dates = ['compra', 'garatiaInicial', 'garatiaFinal'];

    public function usuario()
    {
        // Cambiamos hasOne a belongsTo y definimos la clave foránea
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    public function condicion()
    {
        // Cambiamos hasOne a belongsTo y definimos la clave foránea
        return $this->belongsTo(Condicion::class, 'condicion_id');
    }

    public function tipo()
    {
        // Cambiamos hasOne a belongsTo y definimos la clave foránea
        return $this->belongsTo(Tipo::class, 'tipo_id');
    }



    public function equipos()
    {
        // Cambiamos belongsTo a hasMany y definimos la clave foránea
        return $this->hasMany(Equipo::class, 'usuario_id');//Evita la eliminacion en cascada 
    }

}
