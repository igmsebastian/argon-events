<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>@yield('title')</title>
  <!-- Favicon -->
  <link rel="icon" href="./favicon.ico" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="{{ asset('vendor') }}/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="{{ asset('vendor') }}/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <link rel="stylesheet" href="{{ asset('vendor') }}/fullcalendar/dist/fullcalendar.min.css">
  <link rel="stylesheet" href="{{ asset('vendor') }}/sweetalert2/dist/sweetalert2.min.css">
  <!-- Argon CSS -->
  {{-- <link rel="stylesheet" href="{{ asset('css') }}/app.css" type="text/css"> --}}
  <link rel="stylesheet" href="{{ asset('css') }}/argon.min.css?v=1.2.0" type="text/css">
</head>

<body>
  <!-- Sidenav -->
  @include('layouts.navs.sidebar')
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    @include('layouts.navs.navbar')
    <!-- Header -->
    @include('layouts.header')
    <!-- Page content -->
    @yield('content')
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="{{ asset('vendor') }}/jquery/dist/jquery.min.js"></script>
  <script src="{{ asset('vendor') }}/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('vendor') }}/js-cookie/js.cookie.js"></script>
  <script src="{{ asset('vendor') }}/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="{{ asset('vendor') }}/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  {{-- <script src="{{ asset('vendor') }}/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script> --}}
  {{-- <script src="{{ asset('vendor') }}/moment/min/moment.min.js"></script> --}}
  {{-- <script src="{{ asset('vendor') }}/bootstrap-datetimepicker.js"></script> --}}
  {{-- <script src="{{ asset('vendor') }}/fullcalendar/dist/fullcalendar.min.js"></script> --}}
  {{-- <script src="{{ asset('vendor') }}/sweetalert2/dist/sweetalert2.min.js"></script> --}}

  <!-- Argon JS -->
  <script src="{{ asset('js') }}/argon.min.js?v=1.2.0"></script>
  <script src="{{ asset('js') }}/app.js"></script>
  @stack('script')
</body>

</html>
