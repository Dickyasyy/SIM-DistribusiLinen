<?php

namespace App\Http\Controllers;

use App\Models\Linen;
use App\Models\MasterLinen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LinenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $linen = MasterLinen::orderBy('kode_linen','asc')->Paginate(10);
        return view("list.index",compact("linen"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("list.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'kode_linen' => 'required',
            'nama_linen' => 'required',
            'harga' => 'required|numeric',
            'diskon' => 'nullable|numeric',
            'jumlah_stok' => 'required|numeric',
        ]);
    
        $linen = new MasterLinen();
        $linen->kode_linen = $request->kode_linen;
        $linen->nama_linen = $request->nama_linen;
        $linen->harga = $request->harga;
        $linen->diskon = $request->diskon;
        $linen->jumlah_stok = $request->jumlah_stok;

        $linen->save();
    
        alert('success', 'Data berhasil Disimpan!', 'Good job!');
        return redirect()->route('list.linen');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $linen = MasterLinen::where('nama_linen','LIKE','%'.$request->cari.'%')->Paginate(10);
        return view("list.index",compact("linen"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($kode_linen)
    {
        $linen = MasterLinen::find($kode_linen);
        return view('list.edit', compact('linen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $kode_linen)
    {
        $request->validate([
            'kode_linen' => 'required',
            'nama_linen' => 'required',
            'harga' => 'required|numeric',
            'jumlah_stok' => 'required|numeric',
        ]);

        $linen = MasterLinen::find($kode_linen);
        $linen->kode_linen = $request->kode_linen;
        $linen->nama_linen = $request->nama_linen;
        $linen->harga = $request->harga;
        $linen->jumlah_stok = $request->jumlah_stok;

        //  Hapus gambar lama jika ada gambar baru
        // if ($request->hasFile('gambar')) {
        //     // Hapus gambar lama
        //     Storage::delete('public/' . $linen->gambar);

        //     // Simpan gambar baru
        //     $imagePath = $request->file('gambar')->store('public/images');
        //     $linen->gambar = str_replace('public/', '', $imagePath);
        // }

        $linen->save();

        alert('success', 'Data berhasil diupdate!', 'Good job!');
        return redirect()->route('list.linen');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $linen = MasterLinen::find($id);
        if (!$linen) {
            alert('error', 'Data tidak ditemukan', 'Good luck!');
            return redirect()->route('list.linen');
        }

        // Lanjutkan dengan penghapusan jika data ditemukan
        $linen->delete();

        alert('success', 'Data berhasil dihapus!', 'Good job!');
        return redirect()->route('list.linen');
    }
}
