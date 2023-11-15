<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modal_Awal extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $table = 'modal_awals';

    public $incrementing = false;

    public $timestamps = false;
}
