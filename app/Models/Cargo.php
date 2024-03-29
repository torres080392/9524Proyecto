<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class)->withoutDeleting();
    }


}
