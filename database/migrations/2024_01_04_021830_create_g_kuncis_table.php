<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGKuncisTable extends Migration
{
    public function up()
    {
        Schema::create('g_kuncis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kuncis_id');
            $table->unsignedBigInteger('generate_id')->nullable();
            $table->unsignedBigInteger('sentrals_id');
            $table->timestamps();

            $table->foreign('kuncis_id')->references('id')->on('kuncis')->onDelete('cascade');
            $table->foreign('sentrals_id')->references('id')->on('sentrals')->onDelete('cascade');
            // If you need to add a foreign key for generate_id, adjust it accordingly.
        });
    }

    public function down()
    {
        Schema::table('g_kuncis', function (Blueprint $table) {
            $table->dropForeign(['kuncis_id']);
            $table->dropForeign(['sentrals_id']);
        });
        Schema::dropIfExists('g_kuncis');
    }
}

