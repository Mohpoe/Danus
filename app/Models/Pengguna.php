<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pengguna extends Authenticatable
{
  use HasFactory;
  protected $guarded = [];
  // protected $fillable = [
  //   'nama_pengguna',
  //   'kata_sandi',
  //   'nama_lengkap',
  // ];
  protected $hidden = [
    'kata_sandi',
  ];

  public function setKataSandiAttribute($nilai)
  {
    $this->attributes['kata_sandi'] = bcrypt($nilai);
  }

  public function getFotoAttribute($nilai)
  {
    if (!empty($nilai)) {
      return asset('images/pengguna/' . $nilai);
    } else {
      return asset('images/pengguna/ava.webp');
    }
  }

  // public function pengguna()
  // {
  //   return $this->hasMany('App\Models\Pengguna', 'pengguna_id');
  // }
}
