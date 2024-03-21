<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Condicion extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function equipos()
    {
  
        return $this->hasOne(Equipo::class, 'condicion_id')->withoutDeleting();
    }

}
