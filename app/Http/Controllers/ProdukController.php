<?php

namespace App\Http\Controllers;

use App\Models\produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function produk()
    {
        $data = produk::all();
        return view('produk.produk', compact('data'));
    }

    public function addproduk()
    {
        return view('produk.addproduk');
    }
    public function insertproduk(request $request)
    {

        $this->validate($request, [
            'picture' => 'required|image|mimes:png,jpg,jpeg',
            'name' => 'required',
            'price' => 'required',

        ], [
            'picture.required' => 'Harus Diisi',
            'picture.image' => 'Harus Berupa Gambar',
            'picture.mimes' => 'Harus Berupa PNG,JPG,JPEG',
            'name.required' => 'Harus Diisi',
            'price.required' => 'Harus Diisi',

        ]);
        $data = produk::create([

            'picture' => $request->picture,
            'name' => $request->name,
            'price' => $request->price,

        ]);
        if ($request->hasFile('picture')) {
            $random = $request->file('picture')->getClientOriginalExtension();
            $filename = time() . '.' . $random;
            $request->file('picture')->move('covermakanan/', $filename);
            $data->picture = $filename;
            $data->save();
        }
        return redirect('produk')->with('success', 'Buku Berhasil Di Tambahkan');
    }

    public function showproduk($id)
    {
        $data = produk::findorfail($id);
        return view('produk.editproduk',compact('data'));
    }

    public function updateproduk(request $request, $id)
    {
        $data = produk::findorfail($id);
        $filename = $data->picture;
        $data->update([

            'name' => $request->name,
            'price' => $request->price,

        ]);
        if ($request->hasFile('picture')) {
            if ($data->picture && file_exists(public_path('covermakanan/' . $data->picture))) {
                unlink(public_path('covermakanan/' . $data->picture));
            }
            $random = $request->file('picture')->getClientOriginalExtension();
            $filename = time() . '.' . $random;
            $request->file('picture')->move('covermakanan/', $filename);
            $data->picture = $filename;
            $data->save();
        }
        return redirect('produk')->with('success', 'Buku Berhasil Di Update');
    }
    public function deleteproduk($id)
    {
        try {
            $pelanggan = produk::findOrFail($id);
            $pelanggan->delete();
            return redirect()->route('produk')->with('success', 'Pelanggan berhasil dihapus.');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('produk')->with('error', 'Tidak dapat menghapus pelanggan karena masih terkait dengan penjualan.');
        }
    }
}
