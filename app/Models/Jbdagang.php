<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jbdagang extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }

    public function jualbeli()
    {
        return $this->belongsTo(Jualbeli::class, 'id_jualbeli');
    }
}
