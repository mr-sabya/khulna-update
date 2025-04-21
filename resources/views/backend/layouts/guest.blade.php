<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title') - Admin Panel | Khulna Seba </title>

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('assets/backend/images/favicon.png') }}">


    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('assets/backend/vendor/toastr/css/toastr.min.css') }}">


    <link href="{{ asset('assets/backend/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/backend/css/custom.css') }}" rel="stylesheet">

</head>

<body>


    <div class="login-form">
        <!-- row -->
        <div class="container-fluid">
            @yield('content')
        </div>


        <!-- Required vendors -->
        <script src="{{ asset('assets/backend/vendor/global/global.min.js') }}"></script>
        <script src="{{ asset('assets/backend/js/quixnav-init.js') }}"></script>


        <!-- Toastr -->
        <script src="{{ asset('assets/backend/vendor/toastr/js/toastr.min.js') }}"></script>



        @if(Session::has('success'))
        <script>
            toastr.success("{{ Session::get('success') }}", "Success");
        </script>
        @elseif(Session::has('error'))
        <script>
            toastr.error("{{ Session::get('error') }}", "Error");
        </script>
        @endif

</body>

</html>