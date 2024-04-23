<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function facturas()
    {
        return $this->hasMany(Factura::class);
    }
}
