<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JualBeli extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $primaryKey = 'id_jualbeli';

    public $incrementing = false;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id_jualbeli = IdGenerator::generate(['table' => 'jual_belis', 'field' => 'id_jaulbeli', 'length' => 20, 'prefix' => 'JBL-' . date('ym'), 'reset_on_prefix_change' => true]);
        });
    }

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'id_transaksi');
    }

    public function jbdagang()
    {
        return $this->hasOne(Jbdagang::class, 'id_jualbeli');
    }

    public function jbjasa()
    {
        return $this->hasOne(Jbjasa::class, 'id_jualbeli');
    }
}
