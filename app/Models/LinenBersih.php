<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinenBersih extends Model
{
    use HasFactory;
    protected $table = 'linen_bersihs';
    protected $fillable = ['no_pinta','nama_petugas', 'unit_peminta', 'unit_pemberi', 'status', 'tanggal_entry','tanggal_approve'];
    public function users()
    {
        return $this->belongsToMany(User::class, 'linen_bersih_user', 'linen_bersih_id', 'user_id')->withPivot('no_pinta','jenis_linen', 'jumlah');
    }
}
