<?php

namespace App\Http\Controllers;

use App\Models\pelanggan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function pelanggan()
    {
        $data = pelanggan::all();
        return view('pelanggan.pelanggan', compact('data'));
    }

    public function addpelanggan()
    {
        return view('pelanggan.addpelanggan');
    }

    public function insertpelanggan(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|max:150',
            'alamat' => 'nullable',
            'notelp' => 'nullable',
        ], [
            'name.required' => 'Nama harus diisi',
            'name.unique' => ' Nama sudah dipakai',

        ]);
        pelanggan::create([
            'name' => $request->name,
            'alamat' => $request->alamat,
            'notelp' => $request->notelp,

        ]);

        return redirect('pelanggan')->with('success', 'Berhasil Terdaftar');
    }

    public function showpelanggan($id)
    {
        $data = pelanggan::findorfail($id);
        return view('pelanggan.editpelanggan', compact('data'));
    }

    public function updatepelanggan(Request $request, $id)
    {
        $data = pelanggan::findorfail($id);
        $data->update([

            'name' => $request->name,
            'alamat' => $request->alamat,
            'notelp' => $request->notelp,

        ]);

        return redirect('pelanggan')->with('success', 'Kategori Berhasil Di Update');
    }

    public function deletepelanggan($id)
    {
        try {
            $pelanggan = Pelanggan::findOrFail($id);
            $pelanggan->delete();
            return redirect()->route('pelanggan')->with('success', 'Pelanggan berhasil dihapus.');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('pelanggan')->with('error', 'Tidak dapat menghapus pelanggan karena masih terkait dengan penjualan.');
        }
    }
}
