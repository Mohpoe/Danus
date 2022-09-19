<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
  use HasFactory;
  protected $guarded = [];

  public function pengguna()
  {
    return $this->belongsTo('App\Models\Pengguna', 'pengguna_id');
  }

  public function getCreatedAtAttribute($nilai)
  {
    return Carbon::parse($nilai)->isoFormat('DD/MM/YYYY HH:mm:ss');
  }
}
