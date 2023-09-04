<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Haruncpi\LaravelIdGenerator\IdGenerator;

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
    public function usaha()
    {
        return $this->belongsTo(Person::class, 'id_person');
    }
    public function akun()
    {
        return $this->hasMany(Akun::class, 'id_akun');
    }
}
