<?php

namespace App\Http\Controllers;

use App\Models\LinenKotor;
use App\Models\LinenBersih;
use Illuminate\Http\Request;

class ApproveLinenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $approveLinen = LinenKotor::orderBy('no_pinta','asc')->Paginate(3);
        return view('ruangan.approveLinen.index', compact('approveLinen'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $no_pinta)
    {
        $linenKotor = linenKotor::where('no_pinta', $no_pinta)->first();;
        return view('ruangan.approveLinen.edit', compact('linenKotor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $no_pinta)
    {
        $request->validate([
            'status' => 'required|string',
            'tanggal_approve' => 'required|date',
        ]);

        // Debugging
        // dd($request->all());

        $linenKotor = linenKotor::where('no_pinta', $no_pinta)->first();

        if ($linenKotor) {
            $linenKotor->update([
                'status' => $request->input('status'),
                'tanggal_approve' => $request->input('tanggal_approve'),
            ]);

            // Pindahkan data ke tabel linen Bersih
            $linenBersih = linenBersih::create([
                'no_pinta' => $linenKotor->no_pinta,
                'nama_petugas' => $linenKotor->nama_petugas,
                'unit_peminta' => $linenKotor->unit_peminta,
                'unit_pemberi' => $linenKotor->unit_pemberi,
                'status' => $request->input('status'),
                'tanggal_entry' => $linenKotor->tanggal_entry,
                'tanggal_approve' => $request->input('tanggal_approve'), // Pastikan ini terisi
            ]);

            // Pindahkan data dari pivot table
            foreach ($linenKotor->users as $user) {
                $linenBersih->users()->attach($user->id, [
                    'no_pinta' => $user->pivot->no_pinta,
                    'jenis_linen' => $user->pivot->jenis_linen,
                    'jumlah' => $user->pivot->jumlah,
                ]);
            }

            alert('success', 'Data berhasil diapprove!', 'Good job!');
            return redirect()->route('approve.index');
        }

        alert('error', 'Data tidak ditemukan!', 'Good luck!');
        return redirect()->route('approve.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
