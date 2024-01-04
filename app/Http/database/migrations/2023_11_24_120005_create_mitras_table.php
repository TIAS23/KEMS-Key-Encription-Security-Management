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
        Schema::create('mitras', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('nama_perusahaan_mitra');
            $table->string('nama_petugas');
            $table->string('pekerjaan');
            $table->string('file');
            $table->unsignedBigInteger('id_sentral');
            $table->unsignedBigInteger('id_kunci');
        
            $table->foreign('id_sentral')->references('id')->on('sentrals')->onDelete('cascade');
            $table->foreign('id_kunci')->references('id')->on('kunci')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mitras');
    }
};
