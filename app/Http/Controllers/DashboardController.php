<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\LinenKotor;
use App\Models\LinenBersih;
use App\Models\UnitLayanan;
use Illuminate\Http\Request;
use App\Exports\LinenKotorExport;
use App\Exports\LinenBersihExport;
use Maatwebsite\Excel\Facades\Excel;

class DashboardController extends Controller
{
    public function index()
    {
    $today = Carbon::today();
    // Ambil jumlah linen yang di-order hari ini
    $linenOrderCount = LinenKotor::whereDate('tanggal_entry', $today)->count();
    // Ambil jumlah linen yang di-approve hari ini
    $linenApproveCount = LinenBersih::whereDate('tanggal_approve', $today)->count();
    // Menampilkan unit 
    $units = UnitLayanan::orderBy('created_at','desc')->Paginate(100);
    return view('dashboard.index', compact('units', 'linenOrderCount', 'linenApproveCount'));
    }

    public function showUnit(Request $request)
    {
        $today = Carbon::today();
        // Ambil jumlah linen yang di-order hari ini
        $linenOrderCount = LinenKotor::whereDate('tanggal_entry', $today)->count();
        // Ambil jumlah linen yang di-approve hari ini
        $linenApproveCount = LinenBersih::whereDate('tanggal_approve', $today)->count();
        
        // Pencarian data unit
        $query = $request->input('cari');
        $units = UnitLayanan::where('kode_unit', 'LIKE', '%' . $query . '%')
                    ->orWhere('nama_unit', 'LIKE', '%' . $query . '%')
                    ->paginate(100);
                    
        return view('dashboard.index', compact('units', 'linenOrderCount', 'linenApproveCount'));
    }

    public function DetailOrder(){
        $detailOrder = LinenKotor::all();
        return view('dashboard.linen_masuk_detail', compact('detailOrder'));
    }

    public function orderShow(Request $request)
    {
        $detailOrder = LinenBersih::where('no_pinta','LIKE','%'.$request->cari.'%');
        return view('dashboard.linen_masuk_detail',compact('detailOrder'));
    }

    public function DetailApprove(){
        $detailApprove = LinenBersih::all();
        return view('dashboard.linen_keluar_detail', compact('detailApprove'));
    }

    public function exportLinenKotor()
    {
        return Excel::download(new LinenKotorExport, 'linen_kotor.xlsx');
    }

    public function exportLinenBersih()
    {
        return Excel::download(new LinenBersihExport, 'linen_bersih.xlsx');
    }

    public function create()
    {
        return view('dashboard.unit.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_unit' => 'required|unique:unit_layanans|max:255',
            'nama_unit' => 'required|max:255',
            'keterangan' => 'nullable|string',
        ]);

        $unit = new UnitLayanan;
        $unit->kode_unit = $validated['kode_unit']; // Use the value from the form
        $unit->nama_unit = $validated['nama_unit'];
        $unit->keterangan = $validated['keterangan'];
        $unit->save();

        alert('success', 'Data berhasil disimpan!', 'Good job!');
        return redirect()->route('dashboard.index');
    }
}
