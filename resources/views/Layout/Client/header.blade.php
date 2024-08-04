<header>
    <!-- Header Start -->
    <div class="header-area">
        <div class="main-header ">
            <div class="header-top black-bg d-none d-md-block">
                <div class="container">
                    <div class="col-xl-12">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="header-info-left">
                                <ul>
                                    <li><img src="{{ asset('Client/assets/img/icon/header_icon1.png') }}"
                                            alt="">HaNoi,30°C </li>
                                    <li><img src="{{ asset('Client/assets/img/icon/header_icon2.png') }}"
                                            alt=""><span id="current-date"></span></li>
                                </ul>
                            </div>
                            <div class="header-info-right">
                                <ul class="header-social">
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li> <a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-mid d-none d-md-block">
                <div class="container">
                    <div class="row d-flex align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-3 col-lg-3 col-md-3">
                            <div class="logo">
                                <a href="index.html"><img src="{{ asset('Client/assets/img/logo/logo.png') }}"
                                        alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9">
                            <div class="btn-group">
                                @if (Auth::check())
                                <p class="name-user">{{ Auth::user()->name }}</p>
                                <form action="{{ route('auth.logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn-logout">Logout</button>
                                </form>
                                @if (Auth::user()->role_id == 1)
                                    <a href="{{ route('admin.dashboard') }}" class="btn-logout">Dashboard</a>
                                @endif
                                   
                                @else
                                    <a href="{{ route('auth.LoadLoginform') }}" class="btn header-btn btn-sm">Login</a>
                                    <a href="{{ route('auth.LoadRegisterform') }}"
                                        class="btn header-btn btn-sm">Register</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-10 col-lg-10 col-md-12 header-flex">
                            <!-- sticky -->
                            <div class="sticky-logo">
                                <a href="index.html"><img src="{{ asset('Client/assets/img/logo/logo.png') }}"
                                        alt=""></a>
                            </div>
                            <!-- Main-menu -->
                            <div class="main-menu d-none d-md-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="{{ url('/') }}">Home</a></li>
                                        <li><a href="{{ url('/category') }}">Category</a></li>
                                        <li><a href="{{ url('/about') }}">About</a></li>
                                        <li><a href="contact.html">Contact</a></li>
                                        <li><a href="#">Pages</a>
                                            <ul class="submenu">
                                                <li><a href="elements.html">Element</a></li>
                                                <li><a href="blog.html">Blog</a></li>
                                                <li><a href="single-blog.html">Blog Details</a></li>
                                                <li><a href="details.html">Categori Details</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-4">
                            <div class="header-right-btn f-right d-none d-lg-block d-flex">
                                <i class="fas fa-search special-tag"></i>
                                <div class="search-box mb-3">
                                    <form action="{{ route('search.results') }}" method="GET">
                                        <input type="text" name="query" placeholder="Search">
                                    </form>
                                </div>
                                {{-- Kiểm tra đăng nhập nếu chưa hiện nút đăng nhập đăng ký , nếu rồi thì hiện tên người dùng --}}
                            </div>

                        </div>

                        <!-- Mobile Menu -->
                        <div class="col-12">
                            
                            <div class="mobile_menu d-block d-md-none">
                                
                            </div>
                            
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <!-- Header End -->
</header>

<style>
    .btn-group {
        display: flex;
        justify-content: flex-end;
    }
    .name-user{
        padding-top: 10px;
    }
    .btn-logout{
        margin-left: 10px;
        margin-top: 10px;
        padding: 0px 15px 25px 15px;
        height: 10px;
        background-color: #d86066;
        border: 1px solid #f8f9fa;
        border-radius: 5px;
        color: #000;
    }
</style>
