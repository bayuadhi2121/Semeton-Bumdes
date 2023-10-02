<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JurnalUmum extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $primaryKey = 'id_jumum';

    public $incrementing = false;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id_jumum = IdGenerator::generate(['table' => 'jurnal_umums', 'field' => 'id_jumum', 'length' => 20, 'prefix' => 'JUMUM-' . date('ym'), 'reset_on_prefix_change' => true]);
        });
    }

    public function akun() {
        return $this->belongsTo(Akun::class, 'id_akun');
    }
}
