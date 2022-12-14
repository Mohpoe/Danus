<?php

namespace Database\Seeders;

use App\Models\Pengguna;
use Illuminate\Database\Seeder;

class PenggunaTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Pengguna::create([
      'nama_pengguna' => 'admin',
      'kata_sandi' => bcrypt('kucoba'),
      'kode_asisten' => 'aa',
      'nama_lengkap' => 'Administrator',
      'foto' => 'hd.png',
      'peran' => '0',
    ]);

    Pengguna::create([
      'nama_pengguna' => 'user',
      'kata_sandi' => bcrypt('admin'),
      'kode_asisten' => 'am',
      'nama_lengkap' => 'Registered User',
      'foto' => 'hd.png',
    ]);
  }
}
