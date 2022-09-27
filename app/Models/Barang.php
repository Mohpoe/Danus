<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
  use HasFactory;
  protected $guarded = [];

  public function getGambarBarangAttribute($nilai)
  {
    if (!empty($nilai)) {
      return asset('images/barang/' . $nilai);
    } else {
      return asset('images/barang/dummy.jpg');
    }
  }

  // public function barang()
  // {
  //   return $this->hasMany('App\Models\Riwayat', 'barang_id');
  // }
}
