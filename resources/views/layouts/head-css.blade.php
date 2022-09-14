@yield('css')

<!-- preloader css -->
<link rel="stylesheet" href="{{ asset('assets/css/preloader.min.css') }}" type="text/css" />

<!-- Bootstrap Css -->
<link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{ asset('css/style.css') }}?ver={{ filemtime(public_path('css/style.css')) }}" />
