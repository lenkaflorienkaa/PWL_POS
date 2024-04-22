<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_models', function (Blueprint $table) {
            $table->id();
            $table->string('barang_kode');
            $table->string('barang_nama');
            $table->unsignedBigInteger('kategori_id');
            $table->timestamps();

            // Define foreign key constraint
            $table->foreign('kategori_id')->references('id')->on('kategori_models')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang_models');
    }
}
