<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modal_Awal extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $primaryKey = 'Tahun';
    public $table = 'modal_awals';

    public $incrementing = false;
}
