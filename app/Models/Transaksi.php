<?php

namespace App\Models;

use App\Models\Dagang;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaksi extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $attribute = [
        'keterangan' => null,
        'nota' => null
    ];

    public $primaryKey = 'id_transaksi';

    public $incrementing = false;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id_transaksi = IdGenerator::generate(['table' => 'transaksis', 'field' => 'id_transaksi', 'length' => 20, 'prefix' => 'TRX-' . date('ym'), 'reset_on_prefix_change' => true]);
        });
    }

    public function dagang()
    {
        return $this->hasOne(Dagang::class, 'id_transaksi');
    }
    public function usaha()
    {
        return $this->belongsTo(Usaha::class, 'id_usaha');
    }

    public function jurnalumum()
    {
        return $this->hasMany(JurnalUmum::class, 'id_transaksi');
    }
}
