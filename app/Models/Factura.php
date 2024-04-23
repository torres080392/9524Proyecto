<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Factura extends Model
{
    protected $guarded = [];
    use HasFactory ;//habilitar para borrados suaves

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }

    public function pago()
    {
        return $this->hasOne(Pago::class);
    }

}
