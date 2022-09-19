<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('riwayats', function (Blueprint $table) {
      $table->id();
      $table->foreignId('barang_id')->constrained('barangs')->cascadeOnUpdate()->cascadeOnDelete();
      $table->integer('jumlah');
      $table->unsignedBigInteger('harga');
      // $table->unsignedBigInteger('bayar');
      // $table->unsignedBigInteger('kembalian');
      // $table->foreignId('pengguna_id')->constrained('penggunas')->cascadeOnUpdate()->cascadeOnDelete();
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
    Schema::dropIfExists('riwayats');
  }
}
