<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\PropertyModel;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = PropertyModel::all();
        return view('property', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('createProperty');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $gambarPath = $request->file('image')->store('public/images');
        $namaGambar = basename($gambarPath);

        PropertyModel::create([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $namaGambar,
        ]);

        return view('property');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = PropertyModel::find($id);
        return view('updateProperty', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = PropertyModel::find($id);
        $data->name = $request->name;
        $data->price = $request->price;

        if ($request->hasFile('image')) {
            Storage::delete('public/images/' . $data->image);
            $gambarPath = $request->file('image')->store('public/images');
            $namaGambar = basename($gambarPath);
            $data->image = $namaGambar;
        }

        $data->save();

        return redirect()->route('property.index')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = PropertyModel::find($id);
        Storage::delete('public/images/' . $data->gambar);
        $data->delete();

        return redirect()->route('nama.index')->with('success', 'Data berhasil dihapus.');
    }
}
