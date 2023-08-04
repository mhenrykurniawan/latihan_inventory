<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;


    protected $table = 'supplier';
    protected $fillable = [
        'nama_supplier', 'alamat', 'no_telp', 'created_at',
        'updated_at',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function produk()
    {
        return $this->hasMany(Produk::class, 'id_produk', 'id');
    }
}
