<!DOCTYPE html>
<html lang="en">
<head>
    <title>Health</title>
   <!--  <meta http-equiv="refresh" content="30"/> -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Health medical template project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('blog/styles/bootstrap4/bootstrap.min.css')}}">
    <link href="{{ asset('blog/plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('blog/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('blog/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('blog/plugins/OwlCarousel2-2.2.1/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('blog/styles/main_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('blog/styles/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('js/app.js')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

    <div class="super_container">

      <!-- Menu -->

      @include('post.nav')

      <!-- Info Boxes -->

      @yield('content')
      <!-- Footer -->

      @include('post.footer')

      <script src="{{ asset('blog/js/jquery-3.3.1.min.js')}}"></script>
      <script src="{{ asset('blog/styles/bootstrap4/popper.js')}}"></script>
      <script src="{{ asset('blog/styles/bootstrap4/bootstrap.min.js')}}"></script>
      <script src="{{ asset('blog/plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
      <script src="{{ asset('blog/plugins/easing/easing.js')}}"></script>
      <script src="{{ asset('blog/plugins/parallax-js-master/parallax.min.js')}}"></script>
      <script src="{{ asset('blog/js/custom.js')}}"></script>

      @yield('script')

</script>

  </body>
  </html>