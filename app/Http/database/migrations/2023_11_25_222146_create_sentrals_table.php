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
        Schema::create('sentrals', function (Blueprint $table) {
            $table->id();
            $table->string('city');
            $table->string('site_id');
            $table->string('infra_sys_id');
            $table->string('site_owner');
            $table->unsignedBigInteger('id_kunci');
            $table->foreign('id_kunci')->references('id')->on('kunci')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sentrals');
    }
};

