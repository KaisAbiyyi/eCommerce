<?php

namespace App\Models;

use App\Models\User;
use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailTransaksi extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    public function Transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
