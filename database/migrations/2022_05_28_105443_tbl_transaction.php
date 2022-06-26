<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblTransaction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_transaction', function (Blueprint $table) {
            $table->id();
            $table->integer('id_layanan');
            $table->integer('id_pelanggan');
            $table->integer('id_daya');
            $table->string('jenis_permohonan');
            $table->string('peruntukan');
            $table->string('biaya_token_perdana');
            $table->string('waktu_instalasi');
            $table->string('status_pemasangan');
            $table->string('no_meter');
            $table->string('status_transaksi');
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
        Schema::drop('tbl_transaction');
    }
}
