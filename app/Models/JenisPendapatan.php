<?php

namespace App\Models;

use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPendapatan extends Model
{
    use HasFactory;
    protected $table = 'jenis_pendapatans';
    protected $guarded = [];
    protected $primaryKey = 'id_jpendapatan';

    public $incrementing = false;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id_jpendapatan = IdGenerator::generate(['table' => 'jenis_pendapatans', 'field' => 'id_jpendapatan', 'length' => 20, 'prefix' => 'JPDTN-' . date('ym'), 'reset_on_prefix_change' => true]);
        });
    }
    public function usaha()
    {
        return $this->belongsTo(Usaha::class, 'id_usaha');
    }
    public function jbjasa()
    {
        return $this->hasMany(Jbjasa::class, 'id_jpendapatan');
    }
}
