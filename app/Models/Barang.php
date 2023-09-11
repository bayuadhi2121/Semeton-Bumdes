<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class Barang extends Model
{
    protected $guarded = [];

    public $primaryKey = 'id_barang';

    public $incrementing = false;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id_barang = IdGenerator::generate(['table' => 'barangs', 'field' => 'id_barang', 'length' => 20, 'prefix' => 'BRG-' . date('ym'), 'reset_on_prefix_change' => true]);
        });
    }
}
