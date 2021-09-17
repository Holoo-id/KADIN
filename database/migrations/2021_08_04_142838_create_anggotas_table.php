<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_anggota', function (Blueprint $table) {
            $table->id();
            $table->string('NIK',20)->unique();
            $table->string('Nama');
            $table->date('tgl_lahir');
            $table->string('no_HP',18);
            $table->string('no_WA',18);
            $table->text('alamat');
            $table->foreignId('id_alamat');
            $table->string("jenis_usaha");
            $table->string("produk");
            $table->integer("jumlah_karyawan");
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
        Schema::dropIfExists('tb_anggota');
    }
}
