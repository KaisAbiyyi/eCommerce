<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\DetailTransaksi;
use Illuminate\Support\Facades\Auth;

class ProdukController extends Controller
{
    public function auth()
    {
        if (auth()->user() == false) {
            return redirect()->route('login.view');
        }
    }
    public function index()
    {
        $data = Produk::all();

        return view('home', compact('data'));
    }

    public function show(Request $request, Produk $produk)
    {
        return view('main', compact('produk'));
    }

    public function postkeranjang(Request $request, Produk $produk)
    {
        if (auth()->user()->role == 'customer') {
            $request->validate(
                [
                    'amount' => 'required'
                ]
            );

            DetailTransaksi::create(
                [
                    'qty' => $request->amount,
                    'user_id' => Auth::id(),
                    'produk_id' => $produk->id,
                    'status' => 'keranjang',
                    'totalprice' => $produk->price * $request->amount
                ]
            );

            return redirect()->route('pelanggan.keranjang')->with('status', 'Berhasil Dimasukan Keladam Keranjang');
        }

        return redirect()->route('admin.produk');
    }

    public function keranjang(Request $request)
    {
        if (auth()->user()->role == 'customer') {
            $detailtransaksi = DetailTransaksi::where('status', 'keranjang')->with('produk')->get();

            return view('keranjang', compact('detailtransaksi'));
        }
        return redirect()->route('admin.produk');
    }

    public function bayar(Request $request, DetailTransaksi $detailtransaksi)
    {
        if (auth()->user()->role == 'customer') {
            $produk = $detailtransaksi->produk;
            return view('bayar', compact('produk', 'detailtransaksi'));
        }
        return redirect()->route('admin.produk');
    }

    public function prosesbayar(Request $request, DetailTransaksi $detailtransaksi)
    {
        $request->validate(
            [
                'bukti_transaksi' => 'required|file'
            ]
        );

        $transaksi = Transaksi::create(
            [
                'user_id' => auth()->id(),
                'totalprice' => $detailtransaksi->totalprice,
                'code' => 'INV' . Str::random(10)
            ]
        );

        $detailtransaksi->update(
            [
                'transaksi_id' => $transaksi->id,
                'status' => 'checkout',
                'bukti_transaksi' => $request->bukti_transaksi->store('images')
            ]
        );

        return redirect()->route('pelanggan.summary')->with('status', 'Berhasil Checkout/Upload Bukti');
    }

    public function summary(Request $request)
    {
        if (auth()->user()->role == 'customer') {
            $detailtransaksi = DetailTransaksi::where('user_id', auth()->id())->where('status', 'checkout')->get();

            return view('summary', compact('detailtransaksi'));
        }
        return redirect()->route('admin.produk');
    }
}
