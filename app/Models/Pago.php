<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pago extends Model
{
    protected $guarded = [];
    use HasFactory , SoftDeletes;
    
    public function factura()
    {
        return $this->belongsTo(Factura::class);
    }
}
