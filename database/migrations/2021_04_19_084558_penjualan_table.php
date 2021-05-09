<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PenjualanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualan', function (Blueprint $table) {
            $table->string('id_penjualan',4);
            $table->char('id_barang',3);
            $table->date('tgl_transaksi');
            $table->integer('qty');
            $table->char('id_user',3);
            $table->primary('id_penjualan');
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
    }
}
