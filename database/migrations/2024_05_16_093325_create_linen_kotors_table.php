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
        Schema::create('linen_kotors', function (Blueprint $table) {
            $table->id();
            $table->string('no_pinta');
            $table->string('nama_petugas');
            $table->string('unit_peminta');
            $table->string('unit_pemberi');
            $table->string('status')->default('Belum');
            $table->date('tanggal_entry');
            $table->date('tanggal_approve')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('linen_kotors');
    }
};
