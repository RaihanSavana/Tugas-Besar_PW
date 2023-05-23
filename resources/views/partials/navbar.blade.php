    <!-- Vendor CSS Files -->
  <link href="/vendor/aos/aos.css" rel="stylesheet">
  <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/css/style.css" rel="stylesheet">

    <!-- Vendor JS Files -->
    <script src="/vendor/aos/aos.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="/js/main.js"></script>






    <header id="header" class="d-flex align-items-center fixed-top ">
        <div class="container d-flex justify-content-between">

            <div id="logo">
                <h1><a href="/">Sil<span>am</span></a></h1>
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link @yield('rumah') " href="/">Home</a></li>
                    <li><a class="nav-link @yield('timeline') " href="{{ route('timelines.index') }}">Timeline</a></li>
                    @auth
                        <li><a class="nav-link @yield('riwayat') " href="{{ route('riwayat.index') }}">History</a></li>
                        <li><a class="nav-link @yield('report') " href="{{ route('report.create') }}">Report</a></li>
                        <li class="dropdown"><a href="#"><span>Welcome,{{ auth()->user()->name }}</span> <i
                                    class="bi bi-chevron-down"></i></a>
                            <ul>
                                <li><a href="{{ route('profile.show') }}"><i class="bi bi-person"></i>Profile</a></li>
                                <li>
                                    <form action="/logout" method="post">
                                        @csrf
                                        <button type="submit" class="dropdown-item"><a><i
                                                    class="bi bi-box-arrow-right"></i>Log
                                                Out</a></button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li><a class="nav-link scrollto" href="{{ route('login.index') }}">Login</a></li>
                    @endauth

                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
        </div>
    </header>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var mobileNavToggle = document.querySelector(".mobile-nav-toggle");
            var navbar = document.getElementById("navbar");

            mobileNavToggle.addEventListener("click", function() {
                navbar.classList.toggle("navbar-mobile");
            });
        });
    </script>


    &ensp;
