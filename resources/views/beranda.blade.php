@extends('layouts.master')
@section('title', 'Beranda')

@section('css')
  <link rel="stylesheet" href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}">
  <link href="{{ asset('assets/libs/leaflet/leaflet.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
  <div class="row">
    <div class="col-xxl-8 col-md-12">
      <div class="card card-h-100">
        <div class="card-header">
          <h4 class="card-title">Tentang LABKOMMAT</h4>
        </div><!-- end card header -->

        <div class="card-body">
          <div class="entry-content">
            <p><em>Bismillahirrohmanirrohiim.</em></p>
            <p style="text-align: justify;">Laboratorium Komputer Matematika, atau disingkat <strong><span style="color: #008080;">LABKOMMAT</span></strong>, adalah salah satu unit Jurusan Matematika dan Laboratorium di bawah naungan Fakultas Matematika dan Ilmu Pengetahuan Alam, Universitas Negeri Makassar. Salah satu tujuan dibentuknya <strong><span style="color: #008080;">LABKOMMAT</span></strong> adalah membantu pelaksanaan praktikum mahasiswa jurusan matematika, baik itu program sarjana maupun program pasca sarjana atau lebih <em>simple</em>-nya Asistensi Perkuliahan. Di jurusan matematika, terdapat beberapa mata kuliah yang memerlukan penggunaan komputer. Beberapa di antaranya adalah mata kuliah Algoritma dan Pemrograman Komputer, Komputasi Matematika, dan Pemrograman Web. Oleh karena itu, dibutuhkan beberapa asisten untuk mendampingi dosen selama proses perkuliahan di LABKOMMAT berlangsung.</p>
            <p style="text-align: justify;">Unit jurusan yang satu ini terdiri atas beberapa mahasiswa “spesial”. Mereka diterima sebagai asisten LABKOMMAT setelah melalui beberapa tahap tes untuk diterima sebagai asisten <strong><span style="color: #008080;">LABKOMMAT</span></strong>. Kami di <strong><span style="color: #008080;">LABKOMMAT</span></strong> biasa menyibukkan / tersibukkan dengan beberapa agenda (selain Asistensi Perkuliahan), seperti:</p>
            <ul class="pagar">
              <li><em>LIC</em> (Labkommat Islamic Class)</li>
              <li>Pelatihan <em>Software</em></li>
              <li>Membuat Modul Perkuliahan</li>
              <li><em>Shift </em>(bukan satpam dih)</li>
              <li>Jasa Pelayanan <strong><span style="color: #008080;">LABKOMMAT</span></strong> (<em>Print</em>, Jilid, Cetak Foto, ATK, Jasa Instal <em>Free Software</em> (<em>Software</em> Bebas), Instal <em>Software</em> Perkuliahan dan Laminating)</li>
              <li><em>Cleaning</em> <em>Day</em> (membersihkan area gedung FG Lantai 3 seperti Ruang Laboratorium Komputer dan sekitarnya)</li>
            </ul>
            <p style="text-align: justify;">Punya <em>hastag</em> yang terkenal, yaitu <em>#berLABKOMMAT</em>. Apa itu <em>#berLABKOMMAT</em>? <em>Hastag</em> ini dibentuk oleh salah satu alumni LABKOMMAT bernama Muh. Hadi Purnomo. <em>Hastag</em> ini kerap muncul di gambar desktop komputer di LABKOMMAT sejak tahun 2016 (benarkah?).</p>
          </div>
        </div><!-- end card-body -->
      </div><!-- end card -->
    </div>

    <div class="col-xxl-4 col-md-12">
      <div class="row">
        <div class="col-xxl-12 col-xl-4 col-sm-12">
          <div class="card card-h-100">
            <div class="card-header">
              <h4 class="card-title">Gunakan Aplikasi Kasir</h4>
            </div>
            <div class="card-body">
              <div class="row mb-3">
                <div class="col">Klik tombol di bawah untuk menggunakan aplikasi kasir Divisi Danus LABKOMMAT.</div>
              </div>
              <div class="row">
                <div class="col text-center">
                  <a href="{{ route('masuk.tampil') }}" class="btn btn-lg btn-primary">Login Sekarang</a>
                </div>
              </div>
            </div>
          </div>
          <!-- end card -->
        </div>

        {{-- <div class="col-xxl-12 col-xl-4 col-sm-12">
          <div class="card card-h-100">
            <div class="card-header">
              <h4 class="card-title">Isu &amp; Keluhan</h4>
            </div>
            <div class="card-body">
              Tes
            </div>
          </div>
          <!-- end card -->
        </div> --}}

        {{-- <div class="col-xxl-12 col-xl-4 col-sm-12"> --}}
        <div class="col-12">
          <div class="card card-h-100">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div>
                  <img src="{{ asset('assets/images/logo.png') }}" alt="" class="avatar-lg rounded-circle img-thumbnail">
                </div>
                <div class="ms-3 flex-1">
                  <h5 class="font-size-15 mb-1"><a href="{{ route('masuk.tampil') }}" class="text-dark">LABKOMMAT</a></h5>
                  <p class="text-muted mb-0">Jurusan Matematika FMIPA UNM</p>
                </div>
              </div>
              <div class="mt-3 pt-1">
                <div class="row mb-0 mt-2">
                  <div class="col-1 text-muted"><i class="mdi mdi-whatsapp font-size-15 pe-2 text-primary align-middle"></i></div>
                  <div class="col text-muted"><a target="_blank" href="https://wa.me/6281234567890">+62 812-3456-7890</a> <small>(Khusus WhatsApp)</small></div>
                </div>
                <div class="row mb-0 mt-2">
                  <div class="col-1 text-muted"><i class="mdi mdi-email font-size-15 pe-2 text-primary align-middle"></i></div>
                  <div class="col text-muted"><a href="mailto:danus@labkommat-unm.com">danus@labkommat-unm.com</a></div>
                </div>
                <div class="row mb-0 mt-2">
                  <div class="col-1 text-muted"><i class="mdi mdi-google-maps font-size-15 pe-2 text-primary align-middle"></i></div>
                  <div class="col text-muted">Kampus FMIPA UNM, Jl. Mallengkeri Raya, Makassar, Sulawesi Selatan.</div>
                </div>
              </div>
            </div>
          </div>
          <!-- end card -->
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Temukan kami!</h4>
        </div>
        <div class="card-body">
          <div id="leaflet-map" class="leaflet-map"></div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
  <script src="{{ asset('/assets/libs/leaflet/leaflet.min.js') }}"></script>
  <script src="{{ asset('assets/js/app.min.js') }}?ver={{ filemtime(public_path('assets/js/app.min.js')) }}"></script>
  <script src="{{ asset('js/script.js') }}?ver={{ filemtime(public_path('js/script.js')) }}"></script>
@endsection

@section('script-bottom')
  @if (session()->has('pesanGagal'))
    <script>
      Toast.fire({
        icon: 'error',
        title: "{{ session('pesanGagal') ? session('pesanGagal') : 'Terjadi kesalahan!' }}"
      })
    </script>
  @elseif (session()->has('pesanSukses'))
    <script>
      Toast.fire({
        icon: 'success',
        title: "{{ session('pesanSukses') ? session('pesanSukses') : 'Berhasil diproses!' }}"
      })
    </script>
  @endif
  <script>
    // var mymap = L.map('leaflet-map').setView([51.505, -0.09], 13);
    var mymap = L.map('leaflet-map').setView([-5.186165430801587, 119.4293084608034], 15);
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
      // L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
      maxZoom: 18,
      // attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a>',
      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' + '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' + 'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
      id: 'mapbox/streets-v11',
      tileSize: 512,
      zoomOffset: -1,
      detectRetina: true
    }).addTo(mymap);
    L.marker([-5.186165430801587, 119.4293084608034]).addTo(mymap);
    // var LeafIcon = L.Icon.extend({
    //   options: {
    //     iconSize: [51, 60],
    //     iconAnchor: [22, 94],
    //     popupAnchor: [-3, -76]
    //   }
    // });
    // var greenIcon = new LeafIcon({
    //   iconUrl: 'assets/images/logo.png'
    // });
    // L.marker([-5.186165430801587, 119.4293084608034], {
    //   icon: greenIcon
    // }).addTo(mymap);
  </script>
@endsection
