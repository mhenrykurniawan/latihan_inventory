<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukKeluar extends Model
{
    use HasFactory;

    protected $table = 'produk_keluar';
    protected $fillable = [
        'id_produk', 'jumlah', 'created_at', 'updated_at'
    ];

    protected $dates = ['created_at', 'updated_at'];


    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }
}
