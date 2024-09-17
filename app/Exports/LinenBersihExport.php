<?php

namespace App\Exports;

use App\Models\LinenBersih;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class LinenBersihExport implements FromCollection, WithHeadings, WithMapping
{
    private $rowNumber = 1; // Deklarasi variabel untuk nomor urut
    public function collection()
    {
        return LinenBersih::with('users')->get();
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
            'Tanggal Approve',
            'Detail Jenis Linen',
            'Jumlah'
        ];
    }

    public function map($linenBersih): array
    {
        // Buat array hasil yang akan diisi baris per baris
        $rows = [];
        foreach ($linenBersih->users as $user) {
            $rows[] = [
                // No. tidak ada dalam data pivot, maka gunakan iterasi untuk nomor baris
                $this->rowNumber++, // atau field lain sebagai nomor
                $linenBersih->no_pinta,
                $linenBersih->nama_petugas,
                $linenBersih->unit_peminta,
                $linenBersih->unit_pemberi,
                $linenBersih->status,
                $linenBersih->tanggal_entry,
                $linenBersih->tanggal_approve,
                $user->pivot->jenis_linen,
                $user->pivot->jumlah,
            ];
        }
        return $rows;
    }
}

