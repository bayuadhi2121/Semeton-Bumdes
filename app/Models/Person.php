<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class Person extends Model
{
    use HasFactory;

    protected $guarded = [];

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
            // $model->id = IdGenerator::generate(['table' => 'persons', 'length' => 12, 'prefix' => 'PNG-' . date('ym'), 'reset_on_prefix_change' => true]);
        });
    }
}
