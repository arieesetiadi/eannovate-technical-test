<!DOCTYPE html>
<html dir="ltr"
      lang="en">

<head>
    {{-- Page Title --}}
    <title>{{ $title ?? 'Eannovate Technical Test' }}</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible"
          content="IE=edge">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    {{-- Styles --}}
    <link href="{{ asset('css/style.min.css') }}"
          rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}"
          rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
          integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
          crossorigin="anonymous"
          referrerpolicy="no-referrer" />
</head>

<body>
    <div id="main-wrapper"
         data-layout="vertical"
         data-navbarbg="skin5"
         data-sidebartype="full"
         data-sidebar-position="absolute"
         data-header-position="absolute"
         data-boxed-layout="full">

        {{-- Topbar --}}
        <header class="topbar"
                data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header"
                     data-logobg="skin6">

                    {{-- Brand --}}
                    <a class="navbar-brand"
                       href="{{ route('dashboard') }}">
                        <b class="logo-icon">
                            <img src="{{ asset('images/logo/eannovate-white.png') }}"
                                 alt="Innovate white logo"
                                 class="img-invert img-fluid">
                        </b>
                    </a>
                    {{-- End Brand --}}

                    {{-- Hamburger menu --}}
                    <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
                       href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>

                <div class="navbar-collapse collapse"
                     id="navbarSupportedContent"
                     data-navbarbg="skin5">
                    <ul class="navbar-nav d-none d-md-block d-lg-none">
                        <li class="nav-item">
                            <a class="nav-toggler nav-link waves-effect waves-light text-white"
                               href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto d-flex align-items-center">
                        {{-- Profile --}}
                        <li>
                            <a class="profile-pic"
                               href="#">
                                <img src="{{ asset('images/profiles/default.png') }}"
                                     alt="user-img"
                                     width="36"
                                     class="img-circle">
                                <span class="text-white font-medium">{{ auth()->user()->username }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        {{-- End Topbar --}}

        {{-- Sidebar --}}
        <aside class="left-sidebar"
               data-sidebarbg="skin6">
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        {{-- Dashboard --}}
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                               href="{{ route('dashboard') }}"
                               aria-expanded="false">
                                <i class="fa-solid fa-house"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <hr>
                        {{-- Student --}}
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                               href="{{ route('student.index') }}"
                               aria-expanded="false">
                                <i class="fa-solid fa-users"></i>
                                <span class="hide-menu">Student</span>
                            </a>
                        </li>

                        {{-- Class --}}
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                               href="/class"
                               aria-expanded="false">
                                <i class="fa-solid fa-door-closed"></i>
                                <span class="hide-menu">Class</span>
                            </a>
                        </li>
                        <li class="text-center p-20 upgrade-btn">
                            <a href="{{ route('logout') }}"
                               class="btn btn-danger text-white w-100">
                                <i class="fa-solid fa-power-off"></i> Logout
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        {{-- End Sidebar --}}

        {{-- Content --}}
        <div class="page-wrapper"
             style="min-height: 250px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            {{-- Content Placeholder --}}
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>

            {{-- Footer --}}
            <footer class="footer text-center mt-5">Eannovate Technical Test</a>
            </footer>
            {{-- Footer --}}
        </div>
        {{-- End Content --}}
    </div>

    {{-- Scripts --}}
    <script src="{{ asset('plugins/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('js/waves.js') }}"></script>
    <script src="{{ asset('js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>
