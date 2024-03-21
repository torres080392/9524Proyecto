<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function equipos()
    {
        // Cambiamos belongsTo a hasMany y definimos la clave foránea
        return $this->hasOne(Equipo::class, 'tipo_id')->withoutDeleting();
    }
    
}
