<?php

namespace App\Models;

use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JurnalUmum extends Model
{
    use HasFactory;
    protected $guarded = [];
    // protected $fillable = [
    //     'kredit', // Add 'kredit' to the fillable array
    //     'debit',
    //     'id_akun',
    //     'id_transaksi',
    // ];
    public $primaryKey = 'id_jumum';

    public $incrementing = false;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id_jumum = IdGenerator::generate(['table' => 'jurnal_umums', 'field' => 'id_jumum', 'length' => 20, 'prefix' => 'JUMUM-' . date('ym'), 'reset_on_prefix_change' => true]);
        });
    }
}
