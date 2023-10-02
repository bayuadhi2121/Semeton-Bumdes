<?php

namespace App\Models;

use App\Models\JenisBiaya;
use App\Models\JualBeli;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Beban extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function jbiaya()
    {
        return $this->belongsTo(JenisBiaya::class, 'id_jbiaya');
    }

    public function jualbeli()
    {
        return $this->belongsTo(Jualbeli::class, 'id_jualbeli');
    }
}
