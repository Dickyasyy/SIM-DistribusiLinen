<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('master_linens', function (Blueprint $table) {
            $table->bigIncrements('kode_linen');
            $table->string('nama_linen');
            $table->float('harga');
            $table->float('diskon');
            $table->integer('jumlah_stok');
            $table->timestamps();
        });    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_linens');
    }
};
