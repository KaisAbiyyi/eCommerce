<?php

namespace App\Models;

use App\Models\Kategori;
use App\Models\DetailTransaksi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function Kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function DetailTransaksi()
    {
        return $this->belongsTo(DetailTransaksi::class);
    }
}
