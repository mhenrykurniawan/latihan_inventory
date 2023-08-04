<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukMasuk extends Model
{
    use HasFactory;

    protected $table = 'produk_masuk';
    protected $fillable = [
        'id_produk', 'jumlah', 'created_at', 'updated_at'
    ];

    protected $dates = ['created_at', 'updated_at'];


    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }
}
