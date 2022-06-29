<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabel_sumber_agung', function (Blueprint $table) {
            $table->id("id_lokasi");
            $table->unsignedBigInteger("id_barang");
            $table->foreign("id_barang")->references("id_barang")->on("tabel_barang");
            $table->bigInteger("jumlah");
            $table->longText("status");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tabel_sumber_agung');
    }
};
