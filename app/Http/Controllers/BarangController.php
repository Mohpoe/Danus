<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Faker\Factory as Faker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;

class BarangController extends Controller
{
  public function __construct()
  {
    $this->middleware('admin');
  }

  public function barangIndex()
  {
    $barangs = Barang::get();
    $format_impor = Crypt::encryptString('assets/docs/format_impor.xlsx');
    return view('barang', ['barangs' => $barangs, 'format_impor' => $format_impor]);
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

    return redirect()->route('barang.index')->with('pesanSukses', false);
  }

  public function barangUpdate(Request $request, Barang $barang)
  {
    if ($request->hapus_gambar_barang == '1') {
      File::exists();
    } else {
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
  }

  public function barangDestroy(Request $request, Barang $barang)
  {
    //
  }
}
