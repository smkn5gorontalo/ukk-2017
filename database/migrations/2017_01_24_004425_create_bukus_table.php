<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBukusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bukus', function(Blueprint $table) {
            $table->increments('id');
            $table->string('judul');
            $table->string('noisbn');
            $table->string('penulis');
            $table->string('penerbit');
            $table->integer('tahun');
            $table->integer('stok')->nullable();
            $table->integer('harga_pokok');
            $table->integer('harga_jual');
            $table->integer('diskon');
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
        Schema::drop('bukus');
    }
}
