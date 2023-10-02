<?php

namespace App\Models;

use App\Models\Beban;
use App\Models\JualBeli;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JenisBiaya extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $primaryKey = 'id_jbiaya';

    public $incrementing = false;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id_jbiaya = IdGenerator::generate(['table' => 'jenis_biayas', 'field' => 'id_jbiaya', 'length' => 20, 'prefix' => 'JBY-' . date('ym'), 'reset_on_prefix_change' => true]);
        });
    }

    public function beban()
    {
        return $this->hasMany(Beban::class, 'id_jbiaya');
    }

    public function akun()
    {
        return $this->belongsTo(Jualbeli::class, 'id_jualbeli');
    }
}
