<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblPelanggan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_pelanggan', function (Blueprint $table) {
            $table->id();
            // $table->integer('id_golongan');
            $table->string('nama', 200);
            $table->string('email', 100);
            $table->string('no_hp', 15);
            $table->string('no_telp', 15);
            $table->string('desa');
            $table->string('kecamatan');
            $table->string('alamat');
            $table->string('rT');
            $table->string('rW');
            $table->string('no_rumah');
            // $table->string('no_rumah');
            $table->string('jenis_identita', 50);
            $table->string('no_identitas', 50);
            $table->string('no_npwp', 20);
            $table->string('nama_npwp', 150);
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
        Schema::drop('tbl_pelanggan');
    }
}
