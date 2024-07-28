<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterLinen extends Model
{
    use HasFactory;
    protected $table = 'master_linens';
    protected $primaryKey = 'kode_linen';
    protected $fillable = ['nama_linen', 'harga', 'diskon', 'jumlah_stok'];

}
