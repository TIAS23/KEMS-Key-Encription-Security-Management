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
        Schema::create('engineers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_mitra')->constrained()->onDelete('cascade');
            $table->string('nama_petugas');
            $table->string('pekerjaan');
            $table->foreignId('id_sentral')->constrained('sentrals')->onDelete('cascade');
            $table->string('file'); // Kolom status_download_file
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('engineers');
    }
};
