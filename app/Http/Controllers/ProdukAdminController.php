<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ProdukAdminController extends Controller
{
    public function produkIndex()
    {
        if (auth()->user()->role == 'admin') {
            $produk = Produk::paginate(10);

            return view('produk.index', compact('produk'));
        }
        return redirect()->route('home')->with('status', 'YOU ARE NOT AN ADMIN');
    }

    public function viewaddproduk(Kategori $kategori)
    {
        if (auth()->user()->role == 'admin') {

            $kategori = Kategori::all();

            return view('produk.tambah', compact('kategori'));
        }
        return redirect()->route('home')->with('status', 'YOU ARE NOT AN ADMIN');
    }

    public function addproduk(Request $request)
    {
        $request->validate(
            [
                'kategori_id' => 'required',
                'name' => 'required',
                'image' => 'required|file|image',
                'price' => 'required|numeric'
            ]
        );

        Produk::create(
            [
                'kategori_id' => $request->kategori_id,
                'name' => $request->name,
                'image' => $request->image->store('images/produk'),
                'price' => $request->price
            ]
        );

        return redirect()->route('admin.produk');
    }

    public function editproduk(Produk $produk)
    {
        if (auth()->user()->role == 'admin') {

            $kategori = Kategori::all();

            return view('produk.edit', compact('produk', 'kategori'));
        }
        return redirect()->route('home')->with('status', 'YOU ARE NOT AN ADMIN');
    }

    public function updateproduk(Request $request, Produk $produk)
    {
        $data = $request->validate(
            [
                'kategori_id' => 'required',
                'name' => 'required',
                'image' => 'file|image',
                'price' => 'required|numeric'
            ]
        );
        if (File::exists($produk->image)) {
            unlink($produk->image);
        }
        if ($request->hasFile('image')) {
            $data['image'] = $request->image->store('images/produk');
        } else {
            unset($data['image']);
        }

        $produk->update($data);

        return redirect()->route('admin.produk');
    }

    public function deleteProduk(Produk $produk)
    {
        if (File::exists($produk->image)) {
            unlink($produk->image);
        }
        $produk->delete();

        return redirect()->route('admin.produk');
    }





    //API
    public function index()
    {
        $data = Produk::with('kategori')->get();

        return response()->json(
            [
                'data' => $data
            ]
        );
    }

    public function show(Produk $produk)
    {
        return response()->json(
            [
                'data' => $produk
            ]
        );
    }

    public function destroy(Produk $produk)
    {

        if (File::exists($produk->image)) {
            unlink($produk->image);
        }
        $produk->delete();

        return response()->json(
            [
                'message' => 'Produk Successfully Deleted'
            ]
        );
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'price' => 'required|numeric',
                'kategori_id' => 'required',
                'image' => 'required|mimes:png,jpg,jpeg,pdf,webp'
            ]
        );

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $data = Produk::create([
            'kategori_id' => $request->kategori_id,
            'name' => $request->name,
            'image' => $request->image->store('images/produk'),
            'price' => $request->price
        ]);
        if ($data) {
            return response()->json(
                [
                    'message' => 'Data Added',
                    'data' => $data,
                ],
                201
            );
        } else {
            return response()->json(
                [
                    'message' => "Failed"
                ]
            );
        }
    }

    public function update(Request $request, Produk $produk)
    {
        $validators = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'price' => 'required|numeric',
                'kategori_id' => 'required',
                'image' => 'mimes:png,jpeg,jpg,pdf,webp'
            ],
        );

        if ($validators->fails()) {
            return response()->json($validators->errors());
        }

        if (File::exists($produk->image)) {
            unlink($produk->image);
        }
        $produk->update(
            [
                'name' => $request->name,
                'price' => $request->price,
                'kategori_id' => $request->kategori_id,
                'image' => $request->image->store('images/produk')
            ]
        );

        return response()->json(
            [
                'message' => 'Data Updated',
                'data' => $produk
            ],
            201
        );
    }
}
