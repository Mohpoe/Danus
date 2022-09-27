<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenggunasTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('penggunas', function (Blueprint $table) {
      $table->id();
      $table->string('nama_pengguna')->unique();
      $table->string('kata_sandi');
      $table->char('kode_asisten')->unique();
      $table->char('nama_lengkap');
      $table->string('foto')->nullable();
      $table->enum('peran', ['0', '1'])->default('1');
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
    Schema::dropIfExists('penggunas');
  }
}
