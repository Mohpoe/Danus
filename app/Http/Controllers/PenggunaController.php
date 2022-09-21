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
    //
  }

  public function penggunaUpdate(Request $request, Pengguna $pengguna)
  {
    //
  }

  public function penggunaDestroy(Request $request, Pengguna $pengguna)
  {
    //
  }
}
