<!DOCTYPE html>
<html lang="en" data-bs-theme="{{ Session::get('theme') }}">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/frontend/image/fab.png') }}">
    @if(Route::is('index'))
    <title> Info Khulna | Online Service Platform</title>
    @else
    <title>@yield('title') - Info Khulna | Online Service Platform</title>
    @endif


    <!-- fontawesome -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/fontawesome/css/all.min.css') }}">

    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/bootstrap/css/bootstrap.min.css') }}">

    <!-- slick slider -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/slick/slick.css') }}">

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- css -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/blog.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/custom.css') }}">

    @livewireStyles
</head>

<body>

    <div id="menu-overlay" class="menu-overlay"></div>
    <!-- menu section start -->
    <livewire:frontend.theme.menu />
    <!-- menu section end -->


    <!-- mobile menu start -->
    <livewire:frontend.theme.mobile-menu />
    <!-- mobile menu end -->


    <div class="main-content">
        <!-- sidebar start -->
        <livewire:frontend.theme.sidebar />
        <!-- sidebar end -->

        <!-- content area -->
        <div class="content-area" id="content-area">

            @yield('content')


            <!-- footer start -->
            <livewire:frontend.theme.footer />
            <!-- footer end -->
        </div>
    </div>


    <!-- jquery -->
    <script src="{{ asset('assets/frontend/js/code.jquery.com_jquery-3.7.0.min.js') }}"></script>

    <!-- bootstrap -->
    <script src="{{ asset('assets/frontend/vendor/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- slick slider -->
    <script src="{{ asset('assets/frontend/vendor/slick/slick.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- main js -->
    <script src="{{ asset('assets/frontend/js/main.js') }}"></script>

    @if(Session::get('theme'))
    <script>
        $('#btnSwitch').html('<i class="fa-solid fa-sun"></i>');
        $('#btnSwitch').attr('title', 'Switch to White Theme');
    </script>
    @endif

    <script>
        //ajax csrf token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $('#btnSwitch').click(function() {


            $.ajax({
                type: "GET",
                url: "{{ route('theme') }}",
                dataType: 'json',
                success: function(data) {

                    if (data.added) {
                        document.documentElement.setAttribute('data-bs-theme', 'dark')
                        $('#btnSwitch').html('<i class="fa-solid fa-sun"></i>');
                        $('#btnSwitch').attr('title', 'Switch to White Theme');
                    } else {
                        document.documentElement.setAttribute('data-bs-theme', 'light')
                        $('#btnSwitch').html('<i class="fa-solid fa-moon"></i>');
                        $('#btnSwitch').attr('title', 'Switch to Dark Theme');
                    }

                },
                error: function(data) {
                    console.log('Error:', data);
                }
            });


        })
    </script>

    @yield('scripts')
    @livewireScripts

</body>

</html>