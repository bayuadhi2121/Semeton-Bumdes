<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Haruncpi\LaravelIdGenerator\IdGenerator;

class Akun extends Model
{
    use HasFactory;

    protected $table = 'akuns';
    protected $guarded = [];
    protected $primaryKey = 'id_akun';

    public $incrementing = false;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id_akun = IdGenerator::generate(['table' => 'akuns', 'field' => 'id_akun', 'length' => 20, 'prefix' => 'AKN-' . date('ym'), 'reset_on_prefix_change' => true]);
        });
    }
    public function usaha()
    {
        return $this->belongsTo(Usaha::class, 'id_usaha');
    }
}
