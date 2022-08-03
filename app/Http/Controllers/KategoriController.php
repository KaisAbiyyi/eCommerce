<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Nette\Utils\Json;
use Nette\Utils\Validators;

class KategoriController extends Controller
{
    public function category()
    {
        if (auth()->user()->role == 'admin') {
            $kategori = Kategori::paginate(10);

            return view('kategori.list', compact('kategori'));
        }
        return redirect()->route('home')->with('status', 'YOU ARE NOT AN ADMIN');
    }

    public function viewaddcategory()
    {
        if (auth()->user()->role == 'admin') {
            return view('kategori.add');
        }
        return redirect()->route('home')->with('status', 'YOU ARE NOT AN ADMIN');
    }

    public function addcategory(Request $request)
    {
        $add = $request->validate(
            [
                'name' => 'required'
            ]
        );

        $category = Kategori::create(
            [
                'name' => $request->name
            ]
        );

        return redirect()->route('admin.category')->with('status', 'Category Added');
    }

    public function editcategory(Kategori $kategori)
    {
        if (auth()->user()->role == 'admin') {
            return view('kategori.edit', compact('kategori'));
        }
        return redirect()->route('home')->with('status', 'YOU ARE NOT AN ADMIN');
    }

    public function updatecategory(Request $request, Kategori $kategori)
    {
        $update = $request->validate(
            [
                'name' => 'required'
            ]
        );

        $kategori->update($update);

        return redirect()->route('admin.category')->with('status', 'Category Updated Successfully');
    }

    public function deletecategory(Kategori $kategori)
    {
        $kategori->delete();

        return redirect()->route('admin.category');
    }


    public function index()
    {
        $data = Kategori::all();

        return response()->json(
            [
                'data' => $data
            ]
        );
    }

    public function store(Request $request)
    {
        $store = $request->validate(
            [
                'name' => 'required'
            ]
        );

        $data = Kategori::create($store);

        return response()->json(
            [
                'message' => 'Data Added Successfully',
                'data' => $data
            ],
            201
        );
    }

    public function update(Request $request, Kategori $kategori)
    {
        $update = $request->validate(
            [
                'name' => 'required'
            ]
        );

        $kategori->update($update);

        return response()->json(
            [
                'message' => 'Data Updated Successfully',
                'data' => $kategori
            ],
            201
        );
    }

    public function show(Kategori $kategori)
    {
        return response()->json(
            [
                'data' => $kategori
            ]
        );
    }

    public function destroy(Kategori $kategori)
    {
        $kategori->delete();

        return response()->json(
            [
                'message' => 'Data Deleted Successfully'
            ]
        );
    }
}
