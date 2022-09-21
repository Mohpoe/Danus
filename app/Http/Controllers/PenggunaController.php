<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
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
      'nama_pengguna' => 'required',
      'kode_asisten' => 'required',
      'nama_lengkap' => 'required',
      'foto' => 'required|file|image|max:2048',
      'kata_sandi' => '',
      'ulangi_kata_sandi' => '',
    ]);
  }

  public function penggunaUpdate(Request $request, Pengguna $pengguna)
  {
    $validasi = $request->validate([
      'nama_pengguna' => 'required',
      'kode_asisten' => 'required',
      'nama_lengkap' => 'required',
      'foto' => '',
      'kata_sandi' => '',
      'ulangi_kata_sandi' => '',
    ]);
  }

  public function penggunaDestroy(Request $request, Pengguna $pengguna)
  {
    //
  }
}
