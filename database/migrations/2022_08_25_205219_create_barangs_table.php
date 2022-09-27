<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('barangs', function (Blueprint $table) {
      $table->id();
      $table->char('nama_barang');
      $table->unsignedBigInteger('harga_barang');
      $table->text('deskripsi_barang');
      $table->string('gambar_barang')->nullable();
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
    Schema::dropIfExists('barangs');
  }
}
