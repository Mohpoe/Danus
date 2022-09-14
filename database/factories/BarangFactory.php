<?php

namespace Database\Factories;

use App\Models\Barang;
use Illuminate\Database\Eloquent\Factories\Factory;

class BarangFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array
   */
  protected $model = Barang::class;

  public function definition()
  {
    $barangs = [
      [
        'nama_barang' => 'Materai 10000',
        'harga_barang' => '12000',
        'gambar_barang' => 'dummy.jpg',
      ],
      [
        'nama_barang' => 'Materai 6000',
        'harga_barang' => '7000',
        'gambar_barang' => 'dummy.jpg',
      ],
      [
        'nama_barang' => 'MAP L DAICHII A4 BENING',
        'harga_barang' => '3000',
        'gambar_barang' => 'dummy.jpg',
      ],
      [
        'nama_barang' => 'SNOWMAN V2 0.6 MM',
        'harga_barang' => '3000',
        'gambar_barang' => 'dummy.jpg',
      ],
      [
        'nama_barang' => 'Kertas Portofolio Pocket A4/F4',
        'harga_barang' => '100',
        'gambar_barang' => 'dummy.jpg',
      ],
      [
        'nama_barang' => 'Binder Clip 105',
        'harga_barang' => '1000',
        'gambar_barang' => 'dummy.jpg',
      ],
      [
        'nama_barang' => 'Binder Clip 155',
        'harga_barang' => '1500',
        'gambar_barang' => 'dummy.jpg',
      ],
      [
        'nama_barang' => 'Baterai AA Alkaline',
        'harga_barang' => '3500',
        'gambar_barang' => 'dummy.jpg',
      ],
      [
        'nama_barang' => 'Baterai AAA Alkaline',
        'harga_barang' => '4000',
        'gambar_barang' => 'dummy.jpg',
      ],
      [
        'nama_barang' => 'ESCO MINI GELPEN HL-57 0,5MM',
        'harga_barang' => '2000',
        'gambar_barang' => 'dummy.jpg',
      ],
      [
        'nama_barang' => 'Pulpen Drawing Pen 0,5MM',
        'harga_barang' => '15000',
        'gambar_barang' => 'dummy.jpg',
      ],
      [
        'nama_barang' => 'CD Kosong 500MB',
        'harga_barang' => '5000',
        'gambar_barang' => 'dummy.jpg',
      ],
      [
        'nama_barang' => 'Cetak Berwarna Kertas Lab',
        'harga_barang' => '500',
        'gambar_barang' => 'dummy.jpg',
      ],
      [
        'nama_barang' => 'Cetak Hitam-Putih Kertas Lab',
        'harga_barang' => '100',
        'gambar_barang' => 'dummy.jpg',
      ],
      [
        'nama_barang' => 'Kertas HVS Quarto Sidu',
        'harga_barang' => '50',
        'gambar_barang' => 'dummy.jpg',
      ],
      [
        'nama_barang' => 'Kertas HVS A4 Sidu',
        'harga_barang' => '50',
        'gambar_barang' => 'dummy.jpg',
      ],
      [
        'nama_barang' => 'Kertas HVS F4 Sidu',
        'harga_barang' => '50',
        'gambar_barang' => 'dummy.jpg',
      ],
      [
        'nama_barang' => 'Kertas HVS Quarto Sidu (1 Rim)',
        'harga_barang' => '45000',
        'gambar_barang' => 'dummy.jpg',
      ],
      [
        'nama_barang' => 'Kertas HVS A4 Sidu (1 Rim)',
        'harga_barang' => '45000',
        'gambar_barang' => 'dummy.jpg',
      ],
      [
        'nama_barang' => 'Kertas HVS F4 Sidu (1 Rim)',
        'harga_barang' => '45000',
        'gambar_barang' => 'dummy.jpg',
      ],
      [
        'nama_barang' => 'Label CD',
        'harga_barang' => '2000',
        'gambar_barang' => 'dummy.jpg',
      ],
      [
        'nama_barang' => 'AMPLOP PUTIH BESAR UKURAN 11X23 CM',
        'harga_barang' => '2000',
        'gambar_barang' => 'dummy.jpg',
      ],
      [
        'nama_barang' => 'AMPLOP PUTIH KECIL UKURAN 9,5X15,2 CM',
        'harga_barang' => '1000',
        'gambar_barang' => 'dummy.jpg',
      ],
      [
        'nama_barang' => 'Buku Album Kwarto Isi 200',
        'harga_barang' => '12000',
        'gambar_barang' => 'dummy.jpg',
      ],
      [
        'nama_barang' => 'Map Plastik Kancing',
        'harga_barang' => '4000',
        'gambar_barang' => 'dummy.jpg',
      ],
      [
        'nama_barang' => 'Map Folio Biasa',
        'harga_barang' => '2000',
        'gambar_barang' => 'dummy.jpg',
      ],
      [
        'nama_barang' => 'Pensil 2B FABER CASTELL',
        'harga_barang' => '3000',
        'gambar_barang' => 'dummy.jpg',
      ],
      [
        'nama_barang' => 'Kertas F4 Warna',
        'harga_barang' => '1000',
        'gambar_barang' => 'dummy.jpg',
      ],
      [
        'nama_barang' => 'Amplop Coklat Ukuran A3',
        'harga_barang' => '1000',
        'gambar_barang' => 'dummy.jpg',
      ],
      [
        'nama_barang' => 'Pulpen GREEBEL Hitam',
        'harga_barang' => '2500',
        'gambar_barang' => 'dummy.jpg',
      ],
      [
        'nama_barang' => 'Stabilo Warna (Kuning)',
        'harga_barang' => '2500',
        'gambar_barang' => 'dummy.jpg',
      ],
      [
        'nama_barang' => 'Tip-Ex Kertas',
        'harga_barang' => '3500',
        'gambar_barang' => 'dummy.jpg',
      ],
      [
        'nama_barang' => 'Tipe X Cair',
        'harga_barang' => '3000',
        'gambar_barang' => 'dummy.jpg',
      ],
      [
        'nama_barang' => 'Spidol Whiteboard SNOWMAN (Hitam)',
        'harga_barang' => '5000',
        'gambar_barang' => 'dummy.jpg',
      ],
    ];

    $barang = $this->faker->unique()->randomElement($barangs);

    return [
      'nama_barang' => $barang['nama_barang'],
      'harga_barang' => $barang['harga_barang'],
      'deskripsi_barang' => $this->faker->sentence(10),
      'gambar_barang' => $barang['gambar_barang'],
    ];
  }
}
