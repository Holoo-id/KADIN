<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlamatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_detail_alamat', function (Blueprint $table) {
            $table->id();
            $table->string("lokasi", 8000);
            $table->string("kelurahan_desa", 100);
            $table->string("kecamatan", 100);
            $table->string("kabupaten_kota", 100);
            $table->string("provinsi", 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_detail_alamat');
    }
}
