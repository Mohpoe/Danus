<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pengguna extends Authenticatable
{
  use HasFactory;
  protected $fillable = [
    'nama_pengguna',
    'kata_sandi',
    'nama_lengkap',
  ];
  protected $hidden = [
    'kata_sandi',
  ];

  // public function pengguna()
  // {
  //   return $this->hasMany('App\Models\Pengguna', 'pengguna_id');
  // }
}
