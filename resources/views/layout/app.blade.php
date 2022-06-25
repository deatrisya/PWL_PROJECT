<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('admin/vendors/iconfonts/mdi/css/materialdesignicons.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/css/vendor.bundle.addons.css')}}">

    <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">
    <link rel="shorcut icon" href="{{asset('admin/images/favicon.png')}}">
</head>
<body>
    <div class="container-scroller">
        @include('sweetalert::alert')
        @include('layout.navbar')
        <div class="container-fluid page-body-wrapper">
            @include('layout.sidebar')
            <div class="main-panel">
               <div class="content-wrapper">
                @yield('content')
              </div>
            @include('layout.footer')
            </div>
        </div>
    </div>

    <script src="{{asset('admin/vendors/js/vendor.bundle.base.js')}}"></script>
    <script src="{{asset('admin/vendors/js/vendor.bundle.addons.js')}}"></script>
    <script src="{{asset('admin/js/off-canvas.js')}}"></script>
    <script src="{{asset('admin/js/misc.js')}}"></script>
    <script src="{{asset('admin/js/dashboard.js')}}"></script>
    @yield('js')
</body>
</html>
