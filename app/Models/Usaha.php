<?php

namespace App\Models;

use App\Models\Akun;
use App\Models\Person;
use App\Models\JualBeli;
use App\Models\Transaksi;
use App\Models\JenisPendapatan;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usaha extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $primaryKey = 'id_usaha';

    public $incrementing = false;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id_usaha = IdGenerator::generate(['table' => 'usahas', 'field' => 'id_usaha', 'length' => 20, 'prefix' => 'USH-' . date('ym'), 'reset_on_prefix_change' => true]);
        });
    }

    public function person()
    {
        return $this->belongsTo(Person::class, 'id_person');
    }

    public function jpendapatan()
    {
        return $this->hasMany(JenisPendapatan::class, 'id_jpendapatan');
    }

    public function akun()
    {
        return $this->hasMany(Akun::class, 'id_usaha');
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_usaha');
    }

    public function totaljualbeli()
    {
        return $this->hasManyThrough(JualBeli::class, Transaksi::class, 'id_usaha', 'id_transaksi', 'id_usaha', 'id_transaksi')->where('transaksis.saved', true);
    }
}
