<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = ['nama_produk', 'harga', 'stok'];

    public function detailTransaksis()
    {
        return $this->hasMany(DetailTransaksi::class);
    }
}