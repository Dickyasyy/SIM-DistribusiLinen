<?php

namespace App\Exports;

use App\Models\LinenKotor;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class LinenKotorExport implements FromCollection, WithHeadings, WithMapping
{
    private $rowNumber = 1; // Deklarasi variabel untuk nomor urut
    public function collection()
    {
        // Ambil semua data dari LinenKotor dengan relasi pivot
        return LinenKotor::with('users')->get();
    }

    public function headings(): array
    {
        return [
            'No.',
            'No Pinta',
            'Nama Petugas',
            'Unit Peminta',
            'Unit Pemberi',
            'Status',
            'Tanggal Entry',
            'Jenis Linen',
            'Jumlah'
        ];
    }

    public function map($linenKotor): array
    {
        // Buat array hasil yang akan diisi baris per baris
        $rows = [];
        foreach ($linenKotor->users as $user) {
            $rows[] = [
                // No. tidak ada dalam data pivot, maka gunakan iterasi untuk nomor baris
                $this->rowNumber++, // atau field lain sebagai nomor
                $linenKotor->no_pinta,
                $linenKotor->nama_petugas,
                $linenKotor->unit_peminta,
                $linenKotor->unit_pemberi,
                $linenKotor->status,
                $linenKotor->tanggal_entry,
                $linenKotor->tanggal_approve,
                $user->pivot->jenis_linen,
                $user->pivot->jumlah,
            ];
        }
        return $rows;
    }
}
