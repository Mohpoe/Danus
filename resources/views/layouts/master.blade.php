<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8" />
  <title> @yield('title') | #berLABKOMMAT</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="Aplikasi Kasir Danus" name="description" />
  <meta content="HD" name="author" />
  <!-- App favicon -->
  <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
  @include('layouts.head-css')
</head>

@section('body')
  @include('layouts.body')
@show
<!-- Begin page -->
<div id="layout-wrapper">
  @include('layouts.topbar')
  @include('layouts.sidebar')
  <!-- ============================================================== -->
  <!-- Start right Content here -->
  <!-- ============================================================== -->
  <div class="main-content">
    <div class="page-content">
      <div class="container-fluid">
        @yield('content')
      </div>
      <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
    @include('layouts.footer')
  </div>
  <!-- end main content-->
</div>
<!-- END layout-wrapper -->

<!-- JAVASCRIPT -->
@include('layouts.vendor-scripts')
</body>

</html>
