<!DOCTYPE html>
<html dir="ltr"
      lang="en">

<head>
    {{-- Page Title --}}
    <title>Eannovate Technical Test</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible"
          content="IE=edge">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    {{-- Styles --}}
    <link href="css/style.min.css"
          rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
          integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
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
                       href="/dashboard">
                        <b class="logo-icon">
                            <img src="plugins/images/logo-icon.png"
                                 alt="homepage" />
                        </b>
                        <span class="logo-text">
                            <h2 class="text-dark mt-3">Eannovate</h2>
                        </span>
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
                                <img src="plugins/images/users/varun.jpg"
                                     alt="user-img"
                                     width="36"
                                     class="img-circle">
                                <span class="text-white font-medium">Steave</span>
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
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                               href="/dashboard"
                               aria-expanded="false">
                                <i class="far fa-clock"
                                   aria-hidden="true"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <hr>
                        <li class="text-center p-20 upgrade-btn">
                            <a href="/logout"
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
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <script src="js/waves.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>
