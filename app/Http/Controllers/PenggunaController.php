<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Faker\Factory as Faker;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
  public function __construct()
  {
    $this->middleware('admin');
  }

  public function penggunaIndex()
  {
    $penggunas = Pengguna::get();
    return view('pengguna', ['penggunas' => $penggunas]);
  }

  public function penggunaStore(Request $request)
  {
    $validasi = $request->validate([
      'nama_pengguna' => 'required|unique:penggunas,nama_pengguna',
      'kode_asisten' => 'required|unique:penggunas,kode_asisten',
      'nama_lengkap' => 'required',
      'foto' => 'required|file|image|max:2048',
      'kata_sandi' => 'required|same:ulangi_kata_sandi',
    ]);

    $faker = Faker::create('id_ID');
    $ext = $request->foto->getClientOriginalExtension();
    $fileName = $faker->shuffle($faker->unique()->bothify('????####')) . '_' . time() . '.' . $ext;
    $request->foto->move('images/pengguna', $fileName);

    Pengguna::create([
      'nama_pengguna' => $validasi['nama_pengguna'],
      'kode_asisten' => $validasi['kode_asisten'],
      'nama_lengkap' => $validasi['nama_lengkap'],
      'foto' => $fileName,
      'kata_sandi' => $validasi['kata_sandi'],
    ]);

    return redirect()->route('pengguna.index')->with('pesanSukses', false);
  }

  public function penggunaUpdate(Request $request, Pengguna $pengguna)
  {
    $validasi = $request->validate([
      'nama_pengguna' => 'required|unique:penggunas,nama_pengguna,' . $pengguna->nama_pengguna,
      'kode_asisten' => 'required|unique:penggunas,kode_asisten,' . $pengguna->kode_asisten,
      'nama_lengkap' => 'required',
      'foto' => 'file|image|max:2048',
      'kata_sandi' => 'same:ulangi_kata_sandi',
    ]);

    $pengguna->update([
      'nama_pengguna' => $validasi['nama_pengguna'],
      'kode_asisten' => $validasi['kode_asisten'],
      'nama_lengkap' => $validasi['nama_lengkap'],
    ]);

    if ($request->kata_sandi != '') {
      $pengguna->update(['kata_sandi' => $validasi['kata_sandi']]);
    }

    if ($request->foto != '') {
      $faker = Faker::create('id_ID');
      $ext = $request->foto->getClientOriginalExtension();
      $fileName = $faker->shuffle($faker->unique()->bothify('????####')) . '_' . time() . '.' . $ext;
      $request->foto->move('images/pengguna', $fileName);

      $pengguna->update([
        'foto' => $fileName,
      ]);
    }

    return redirect()->route('pengguna.index')->with('pesanSukses', false);
  }

  public function penggunaDestroy(Request $request, Pengguna $pengguna)
  {
    //
  }
}
