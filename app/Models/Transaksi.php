<?php

namespace App\Models;

use App\Models\User;
use App\Models\DetailTransaksi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaksi extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    public function DetailTransaksi()
    {
        return $this->hasMany(DetailTransaksi::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
