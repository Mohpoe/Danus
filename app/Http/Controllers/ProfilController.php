<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
  public function profilIndex()
  {
    return view('profil');
  }

  public function profilUpdate(Request $request, Pengguna $profil)
  {
    //
  }
}
