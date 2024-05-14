<?php

namespace App\Http\Controllers;

use App\Models\pelanggan;
use App\Models\penjualan;
use App\Models\produk;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function penjualan()
    {
        $data = penjualan::all();
        return view('penjualan.penjualan', compact('data'));
    }

    public function addpenjualan()
    {
        $pelanggan = pelanggan::all();
        $produk = produk::all();
        return view('penjualan.addpenjualan', compact('pelanggan', 'produk'));
    }
    public function insertpenjualan(request $request)
    {

        $this->validate($request, [

            'pelanggan_id' => 'required',
            'produk_id' => 'required',
            'kuantitas' => 'required',
            'total' => 'required',


        ], [

            'pelanggan_id.required' => 'Harus Diisi',
            'produk_id.required' => 'Harus Diisi',
            'kuantitas.required' => 'Harus Diisi',
            'total.required' => 'Harus Diisi',

        ]);
        $data = penjualan::create([
            'pelanggan_id' => $request->pelanggan_id,
            'produk_id' => $request->produk_id,
            'kuantitas' => $request->kuantitas,
            'total' => $request->total,


        ]);
        return redirect('penjualan')->with('success', 'Buku Berhasil Di Tambahkan');
    }

    public function getproducts()
{
    $products = Produk::all()->pluck('name'); // Mengambil hanya kolom 'name'
    return response()->json($products);
}

}
