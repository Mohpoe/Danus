<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Faker\Factory as Faker;
use Illuminate\Http\Request;

class BarangController extends Controller
{
  public function __construct()
  {
    $this->middleware('admin');
  }

  public function barangIndex()
  {
    $barangs = Barang::get();
    return view('barang', ['barangs' => $barangs]);
  }

  public function barangStore(Request $request)
  {
    $validasi = $request->validate([
      'nama_barang' => 'required',
      'harga_barang' => 'required|numeric',
      'deskripsi_barang' => 'required',
      'gambar_barang' => 'required|file|image|max:2048',
    ]);

    $faker = Faker::create('id_ID');
    $ext = $request->gambar_barang->getClientOriginalExtension();
    $fileName = $faker->shuffle($faker->unique()->bothify('????####')) . '_' . time() . '.' . $ext;
    $request->gambar_barang->move('images/barang', $fileName);

    Barang::create([
      'nama_barang' => $validasi['nama_barang'],
      'harga_barang' => $validasi['harga_barang'],
      'deskripsi_barang' => $validasi['deskripsi_barang'],
      'gambar_barang' => $fileName,
    ]);

    return redirect()->route('beranda')->with('pesanSukses', false);
  }

  public function barangUpdate(Request $request, Barang $barang)
  {
    $validasi = $request->validate([
      'nama_barang' => 'required',
      'harga_barang' => 'required|numeric',
      'deskripsi_barang' => 'required',
      'gambar_barang' => 'required|file|image|max:2048',
    ]);

    $faker = Faker::create('id_ID');
    $ext = $request->gambar_barang->getClientOriginalExtension();
    $fileName = $faker->shuffle($faker->unique()->bothify('????####')) . '_' . time() . '.' . $ext;
    $request->gambar_barang->move('images/barang', $fileName);

    $barang->update([
      'nama_barang' => $validasi['nama_barang'],
      'harga_barang' => $validasi['harga_barang'],
      'deskripsi_barang' => $validasi['deskripsi_barang'],
      'gambar_barang' => $fileName,
    ]);
  }

  public function barangDestroy(Request $request, Barang $barang)
  {
    //
  }
}
