<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitLayanan extends Model
{
    use HasFactory;
    protected $table = 'unit_layanans';
    protected $primaryKey = 'kode_unit';
    protected $fillable = ['nama_unit', 'keterangan'];

    public $incrementing = false;
    protected $keyType = 'string';
}
