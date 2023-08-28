<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Person extends Authenticatable
{
    use HasFactory;

    protected $table = 'persons';
    protected $guarded = [];
    protected $primaryKey = 'id_person';

    protected $attributes = [
        'alamat' => null,
        'kontak' => null,
    ];

    protected $hidden = [
        'password',
    ];

    public $incrementing = false;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id_person = IdGenerator::generate(['table' => 'persons', 'field' => 'id_person', 'length' => 12, 'prefix' => 'PNG-' . date('ym'), 'reset_on_prefix_change' => true]);
        });
    }
}
