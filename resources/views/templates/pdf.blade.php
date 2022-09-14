@php
use Carbon\Carbon;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
Carbon::setLocale('id');
@endphp
<html>

<head>
  <style>
    body {
      font-family: sans-serif;
      font-size: 10pt;
    }

    table.table {
      font-size: 10pt;
      border-collapse: collapse;
      text-align: center;
      width: 100%;
    }

    th,
    td {
      vertical-align: top;
    }
  </style>
</head>

<body>
  <!--mpdf
    <htmlpagefooter name="myfooter">
      <div style="border-top: 1px solid #000000; font-size: 8pt; text-align: left; padding-top: 3mm; font-style: italic;">
        Dibuat melalui aplikasi {{ config('app.name') }} pada {{ Carbon::create('now', 'Asia/Makassar')->isoFormat('dddd, DD-MM-YYYY HH:mm:ss') }}
      </div>
    </htmlpagefooter>
    <sethtmlpagefooter name="myfooter" value="on" />
    mpdf-->

  <table class="table" style="border-bottom: 2px solid;">
    <tbody>
      <tr>
        {{-- <td style="padding-bottom: 1rem;"><img src="https://skbt.mohpoe.com/images/logo_surat.jpg" style="height: 6rem" alt="Logo"></td> --}}
        <td style="padding-bottom: 1rem;"><img src="{{ public_path('assets/images/logo.png') }}" style="height: 6rem" alt="Logo"></td>
        <td style="padding-bottom: 1rem;">
          <div>
            <h2 style="margin: 0; padding: 0">PEMERINTAH {{ strtoupper($konfigurasi->firstWhere('key', 'konfigurasi_jenis_kabkota')->value) }} {{ strtoupper($konfigurasi->firstWhere('key', 'konfigurasi_kabkota')->value) }}</h2>
          </div>
          <div>
            <h1 style="margin: 0; padding: 0">{{ strtoupper($konfigurasi->firstWhere('key', 'konfigurasi_instansi')->value) }}</h1>
          </div>
          <div>{!! wordwrap($konfigurasi->firstWhere('key', 'konfigurasi_alamat')->value, 70, "<br>\n") !!}</div>
          {{-- <div>Jalan Pameran, Lingk. Batu-Batu, Kelurahan Darma, Kecamatan Polewali<br>Kabupaten Polewali Mandar, Kode Pos 91314</div> --}}
        </td>
      </tr>
    </tbody>
  </table>

  <h3 style="text-align: center; margin: 1rem 0 .2rem 0;"><u>SURAT KETERANGAN</u></h3>

  <div style="text-align: center">Nomor: B-{{ sprintf('%03u', $nomorUrut) }}/Itkab/{{ $surat->surat_kode_skbt }}/{{ numberToRoman(Carbon::create('now')->isoFormat('MM')) }}/{{ Carbon::create('now')->isoFormat('YYYY') }}</div>

  <p>Yang bertanda tangan dibawah ini :</p>

  <table class="table" style="text-align: left">
    <tbody>
      <tr>
        <td width="25%">Nama Lengkap</td>
        <td width="2%">:</td>
        <td><b>{{ $konfigurasi->firstWhere('key', 'konfigurasi_nama_lengkap')->value }}</b></td>
      </tr>
      <tr>
        <td>NIP</td>
        <td>:</td>
        <td>{{ nip($konfigurasi->firstWhere('key', 'konfigurasi_nip')->value) }}</td>
      </tr>
      <tr>
        <td>Pangkat/Golongan</td>
        <td>:</td>
        <td>{{ $konfigurasi->firstWhere('key', 'konfigurasi_pangkat_golongan')->value }}</td>
      </tr>
      <tr>
        <td>Jabatan</td>
        <td>:</td>
        <td>{{ $konfigurasi->firstWhere('key', 'konfigurasi_jabatan')->value }}</td>
      </tr>
    </tbody>
  </table>

  <p>MENERANGKAN, bahwa Pegawai Negeri Sipil (PNS) :</p>

  <table class="table" style="text-align: left">
    <tbody>
      <tr>
        <td width="25%">Nama Lengkap</td>
        <td width="2%">:</td>
        <td><b>{{ $surat->surat_nama_lengkap }}</b></td>
      </tr>
      <tr>
        <td>Tempat/Tanggal Lahir</td>
        <td>:</td>
        {{-- <td>{{ $surat->surat_tempat_lahir }} / {{ Carbon::create($surat->surat_tanggal_lahir)->isoFormat('DD MMMM YYYY') }}</td> --}}
        <td>{{ $surat->surat_tempat_tanggal_lahir }}</td>
      </tr>
      <tr>
        <td>NIP</td>
        <td>:</td>
        {{-- <td>{{ substr($surat->surat_nip, 0, 6) . ' ' . substr($surat->surat_nip, 6, 8) . ' ' . substr($surat->surat_nip, 14, 1) . ' ' . substr($surat->surat_nip, 15, 3) }}</td> --}}
        <td>{{ $surat->surat_nip }}</td>
      </tr>
      <tr>
        <td>Pangkat/Golongan</td>
        <td>:</td>
        <td>{{ $surat->surat_pangkat_golongan }}</td>
      </tr>
      <tr>
        <td>Jabatan</td>
        <td>:</td>
        <td>{{ $surat->surat_jabatan }}</td>
      </tr>
      <tr>
        <td>Unit Kerja</td>
        <td>:</td>
        <td>{{ $surat->surat_unit_kerja }}</td>
      </tr>
      <tr>
        <td>Keperluan</td>
        <td>:</td>
        <td>Kelengkapan Berkas {{ $surat->surat_keperluan_gabung }}</td>
      </tr>
    </tbody>
  </table>

  <p>Berdasarkan data Laporan Hasil Pemeriksaan {{$konfigurasi->firstWhere('key', 'konfigurasi_instansi')->value}} {{$konfigurasi->firstWhere('key', 'konfigurasi_jenis_kabkota')->value}} {{$konfigurasi->firstWhere('key', 'konfigurasi_kabkota')->value}} sampai dikeluarkannya surat keterangan ini, PNS yang bersangkutan tidak terkait dengan temuan hasil pemeriksaan.</p>

  <p>Surat keterangan ini tidak menerangkan temuan aparat pengawas lainnya dan hanya berlaku 30 (tiga puluh) hari kalender sejak dikeluarkan.</p>

  <p style="margin: 0 0 2rem 0">Demikian surat keterangan ini dibuat untuk diketahui dan dipergunakan sebagaimana mestinya.</p>

  <table class="table" style="text-align: left">
    <tbody>
      <tr>
        <td>&nbsp;</td>
        <td width="40%">{{ $konfigurasi->firstWhere('key', 'konfigurasi_tempat_surat')->value }}, {{ Carbon::create('now', 'Asia/Makassar')->isoFormat('DD MMMM YYYY') }}</td>
      </tr>
      <tr>
        <td></td>
        <td style="padding-bottom: 1rem; padding-top: 1rem; padding-left: 1rem"><img src="{{ public_path('berkas/temp.png') }}"></td>
      </tr>
      <tr>
        <td></td>
        <td><b><u>{{ $konfigurasi->firstWhere('key', 'konfigurasi_nama_lengkap')->value }}</u></b></td>
      </tr>
      <tr>
        <td></td>
        <td>Pangkat : {{ strtok($konfigurasi->firstWhere('key', 'konfigurasi_pangkat_golongan')->value, '/') }}</td>
      </tr>
      <tr>
        <td></td>
        <td>NIP. {{ nip($konfigurasi->firstWhere('key', 'konfigurasi_nip')->value) }}</td>
      </tr>
    </tbody>
  </table>
</body>

</html>
