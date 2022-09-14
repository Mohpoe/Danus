<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pengguna;
use App\Models\Riwayat;
use Faker\Factory as Faker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LamanController extends Controller
{
  public function beranda()
  {
    $barangs = Barang::orderBy('nama_barang')->get();
    return view('admin', ['barangs' => $barangs]);
    // if (Auth::check()) {
    // } else {
    //   return view('beranda');
    // }
  }

  public function masukTampil()
  {
    return view('masuk');
  }

  public function masukProses(Request $request)
  {
    $validasi = $request->validate([
      'nama_pengguna' => 'required',
      'kata_sandi' => 'required',
    ]);

    $user = Pengguna::firstWhere('nama_pengguna', $validasi['nama_pengguna']);

    if ($user) {
      if (Hash::check($validasi['kata_sandi'], $user->kata_sandi)) {
        Auth::login($user);
        return redirect()->route('beranda');
      }
    }

    return redirect()->route('masuk.tampil')->with('pesanGagal', true);
  }

  public function keluar(Request $request)
  {
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    if (!Auth::check()) {
      return redirect()->route('beranda')->with('pesanSukses', 'Anda telah keluar!');
    } else {
      return redirect()->route('beranda')->with('pesanGagal', false);
    }
  }

  public function checkoutIndex(Request $request)
  {
    $barangs = $request->barangs;
    $qty = $request->qty;

    $hargas = [];
    $totalHarga = 0;

    for ($i = 0; $i < count($barangs); $i++) {
      $rules = [
        'barangs.*' => 'required|min:1',
        'qty.*' => 'required|min:1',
      ];

      $validasi = Validator::make($request->all(), $rules);

      if ($validasi->fails()) {
        return redirect()->route('beranda')->with('pesanGagal', false);
      }

      $totalHarga += $hargas[] = Barang::find($barangs[$i])->harga_barang * $qty[$i];
    }

    return view('checkout', ['barangs' => $barangs, 'qty' => $qty, 'hargas' => $hargas, 'totalHarga' => $totalHarga]);
  }

  public function checkoutStore(Request $request)
  {
    $rules = [
      'bayar' => 'required|numeric',
      'kembalian' => 'required|numeric|min:0',
    ];
    $validasi = Validator::make($request->all(), $rules);

    if ($validasi->fails()) {
      return redirect()->route('beranda')->with('pesanGagal', false);
    }

    $barangs = $request->barangs;
    $qty = $request->qty;

    foreach ($barangs as $i => $barang) {
      // $barang = Barang::find($barang);
      // $kuantitas = $qty[$i];
      Riwayat::create([
        'barang_id' => $barang,
        'jumlah' => $qty[$i],
        'total' => $request->totalHarga,
        'bayar' => $request->bayar,
        'kembalian' => $request->kembalian,
        'pengguna_id' => Auth::user()->id,
      ]);
    }

    return redirect()->route('beranda')->with('pesanSukses', 'Transaksi berhasil!');
  }

  public function riwayat()
  {
    $riwayats = Riwayat::get();
    return view('riwayat', ['riwayats' => $riwayats]);
  }

  public function petunjuk()
  {
    return view('petunjuk');
  }

  public function bantuan()
  {
    return view('bantuan');
  }

  public function coba()
  {
    $barang = Barang::factory()->make();
    dump($barang->nama_barang);
  }
}
