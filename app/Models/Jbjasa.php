<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jbjasa extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $fillable = ['id_jpendapatan', 'id_jualbeli'];

    public function jenispendapatan()
    {
        return $this->belongsTo(JenisPendapatan::class, 'id_jpendapatan');
    }

    public function jualbeli()
    {
        return $this->belongsTo(Jualbeli::class, 'id_jualbeli');
    }
}
