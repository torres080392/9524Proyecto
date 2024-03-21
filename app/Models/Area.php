<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;

class Area extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    
    public function usuarios()
    {
        // Cambiamos belongsTo a hasMany y definimos la clave foránea
        return $this->hasOne(Usuario::class, 'area_id')->withoutDeleting();
    }
   

}
