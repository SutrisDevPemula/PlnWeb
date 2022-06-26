<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblDaya extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_daya', function (Blueprint $table) {
            $table->id();
            $table->integer('jumlah_daya');
            $table->string('angsuran');
            // $table->string('biaya_token');
            $table->string('biaya_ppj');
            $table->string('biaya_slo');
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
        //
        Schema::drop('tbl_daya');
    }
}
