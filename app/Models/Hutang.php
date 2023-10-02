<?php

namespace App\Models;

use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hutang extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $primaryKey = 'id_hutang';

    public $incrementing = false;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id_hutang = IdGenerator::generate(['table' => 'hutangs', 'field' => 'id_hutang', 'length' => 20, 'prefix' => 'HTG-' . date('ym'), 'reset_on_prefix_change' => true]);
        });
    }

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'id_transaksi');
    }
}
