<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\LinenKotor;
use App\Models\MasterLinen;
use App\Models\UnitLayanan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class InputLinenKotorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $units = UnitLayanan::all();
        $master_linens = MasterLinen::all();
        return view('ruangan.inputMasuk.create', compact('units', 'master_linens'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'no_pinta' => 'required|string',
            'unit_peminta' => 'required|string',
            'unit_pemberi' => 'required|string',
            'tanggal_entry' => 'required|date',
            'jenis_linen' => 'required|array',
            'jenis_linen.*' => 'required|string',
            'jumlah' => 'required|array',
            'jumlah.*' => 'required|integer',
            'status' => 'nullable|string',
        ]);

        $user = Auth::user();

        $linenKotor = LinenKotor::create([
            'nama_petugas' => $user->nama_petugas,
            'no_pinta' => $request->input('no_pinta'),
            'unit_peminta' => $request->input('unit_peminta'),
            'unit_pemberi' => $request->input('unit_pemberi'),
            'tanggal_entry' => $request->input('tanggal_entry'),
            'status' => $request->input('status'),
        ]);

        // Simpan setiap jenis linen dan jumlahnya di pivot table
        foreach ($request->input('jenis_linen') as $key => $jenisLinen) {
            $linenKotor->users()->attach($user->id, [
                'no_pinta' => $request->input('no_pinta'),
                'jenis_linen' => $jenisLinen,
                'jumlah' => $request->input('jumlah')[$key],
            ]);
        }
    
        // Redirect dengan no_pinta sebagai parameter
        alert('success', 'Data berhasil disimpan!', 'Good job!');
        return redirect()->route('input.inputMasuk.generatePDF', [
            'no_pinta' => $request->input('no_pinta'),
            'redirect_to' => route('detail.linen.masuk')
        ]);
    }

    public function generatePDF($no_pinta)
    {
        $linenKotor = LinenKotor::where('no_pinta', $no_pinta)
            ->with(['users' => function($query) use ($no_pinta) {
                $query->wherePivot('no_pinta', $no_pinta);
            }])
            ->first();

        if (!$linenKotor) {
            alert('error', 'Data tidak ditemukan!', 'Good job!');
            return redirect()->route('input.linenMasuk.create');
        }

        $redirect_to = request()->input('redirect_to', route('detail.linen.masuk'));

        $pdf = PDF::loadView('ruangan.inputMasuk.cetak', compact('linenKotor', 'redirect_to'));

        return $pdf->stream('linenKotor'.$linenKotor->no_pinta.'.pdf');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
