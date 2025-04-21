<div class="menu">
    <div class="container-fluid">
        <div class="menu-section">


            <div class="logo">
                <a href="#" class="menu-btn" id="menu_btn">
                    <i class="fa-solid fa-bars-staggered"></i>
                </a>
                <a href="{{ route('index')}}">
                    <!-- <img src="{{ url('assets/frontend/image/logo.png') }}" alt=""> -->
                    <h4 class="m-0"><i class="fa-solid fa-info-circle"></i> Info Khulna</h4>
                </a>
            </div>

            <div class="main-menu">
                <div class="action d-flex gap-3 justify-content-between align-items-center me-3">


                    <!-- language toggle -->
                    <div class="language-toggle">
                        <a href="" class="active">EN</a>
                        <a href="" class="{{ Session::get('lang') == 'bn' ? 'active' : '' }}">BN</a>
                    </div>

                    <!-- login -->
                    @if (Auth::check())
                    <a href="#" class="btn btn-primary">Dashboard</a>
                    @else
                    <a href="{{ route('login') }}" class="login-btn">Login</a>

                    @endif

                </div>

                <div class="buttons">
                    <a href="javascript:void(0)" id="btnSwitch" title="Switch to Dark Theme"><i class="fa-solid fa-moon"></i></a>
                    <!-- <a href="#"><i class="fa-solid fa-sun"></i></a> -->
                </div>

                <a href="{{ route('help.index')}}" class="help"><i class="fa-solid fa-circle-info"></i> Help</a>
            </div>
        </div>
    </div>
</div>