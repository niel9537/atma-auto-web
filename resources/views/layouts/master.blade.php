<!-- Preloader -->
<!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('AdminLTE') }}/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> -->
@include('layouts/header')
@include('layouts/navbar')
@include('layouts/sidebar')
@yield('content')

@include('layouts/footer')
