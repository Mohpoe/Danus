<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
  use HasFactory;
  protected $guarded = [];

  public function barang()
  {
    return $this->belongsTo('App\Models\Barang', 'barang_id');
  }

  public function transaksi()
  {
    return $this->belongsTo('App\Models\Transaksi', 'transaksi_id');
  }

  public function getCreatedAtAttribute($nilai)
  {
    return Carbon::parse($nilai)->isoFormat('DD/MM/YYYY HH:mm:ss');
  }
}
