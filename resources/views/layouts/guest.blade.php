<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="/assets/lib/animate/animate.min.css" rel="stylesheet">
        <link href="/assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="/assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

        <!-- Customized Bootstrap Stylesheet -->
        <link href="/assets/css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="/assets/css/style.css" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="container-xxl bg-white p-0">
            <!-- Spinner Start -->
            <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
                <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                    <span class="sr-only">Načítání...</span>
                </div>
            </div>
            <!-- Spinner End -->

            <!-- Navbar & Hero Start -->
            <div class="container-xxl position-relative p-0">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                    <a href="/" class="navbar-brand p-0">
                        <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>Restoran</h1>
                        <!-- <img src="img/logo.png" alt="Logo"> -->
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars"></span>
                    </button>
                    
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav ms-auto py-0 pe-4">
                            <a href="/" class="nav-item nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}">Domů</a>
                            <a href="{{ route('categories.index') }}" class="nav-item nav-link {{ Route::currentRouteName() == 'categories.index' ? 'active' : '' }}">Kategorie</a>
                            <a href="{{ route('menus.index') }}" class="nav-item nav-link {{ Route::currentRouteName() == 'menus.index' ? 'active' : '' }}">Menu</a>
                            <a href="{{ route('reservations.step.one') }}" class="nav-item nav-link {{ Route::currentRouteName() == 'reservations.step.one' ? 'active' : '' }}">Rezervace</a>
                            <a href="contact.html" class="nav-item nav-link">Kontakt</a>
                        </div>
                        <a href="{{ route('reservations.step.one') }}" class="btn btn-primary py-2 px-4">Zarezervovat stůl</a>
                    </div>

                </nav>

                @if (Route::currentRouteName() == 'home')
                    <div class="container-xxl py-5 bg-dark hero-header mb-5">
                        <div class="container my-5 py-5">
                            <div class="row align-items-center g-5">
                                <div class="col-lg-6 text-center text-lg-start">
                                    <h1 class="display-3 text-white animated slideInLeft">Vychutnejte si<br>špičkovou gastronomii</h1>
                                    <p class="text-white animated slideInLeft mb-4 pb-2">Zveme vás na nezapomenutelný gurmánský zážitek, kde se snoubí dokonalé chutě, kvalitní suroviny a příjemné prostředí. Přijďte ochutnat naše speciality připravené s láskou a vášní našich kuchařů. Těšíme se na vaši návštěvu!</p>
                                    <a href="{{ route('reservations.step.one') }}" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft">Zarezervovat stůl</a>
                                </div>
                                <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                                    <img class="img-fluid" src="/assets/img/hero.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="container-xxl py-5 bg-dark hero-header mb-5">
                        <div class="container text-center my-5 pt-5 pb-4">
                            <h1 class="display-3 text-white mb-3 animated slideInDown">
                                @if (Route::currentRouteName() == 'categories.index')
                                    Kategorie
                                @elseif (Route::currentRouteName() == 'menus.index')
                                    Menu
                                @elseif (Route::currentRouteName() == 'reservations.step.one')
                                    Rezervace
                                @else
                                    Stránka
                                @endif
                            </h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center text-uppercase">
                                    <li class="breadcrumb-item"><a href="/">Domů</a></li>
                                    <li class="breadcrumb-item text-white active" aria-current="page">
                                        @if (Route::currentRouteName() == 'categories.index')
                                            Kategorie
                                        @elseif (Route::currentRouteName() == 'menus.index')
                                            Menu
                                        @elseif (Route::currentRouteName() == 'reservations.step.one')
                                            Rezervace
                                        @else
                                            Stránka
                                        @endif
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                @endif
            </div>
            <!-- Navbar & Hero End -->

            {{ $slot }}

            <!-- Footer Start -->
            <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
                <div class="container py-5">
                    <div class="row g-5">
                        <div class="col-lg-3 col-md-6">
                            <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Restoran</h4>
                            <a class="btn btn-link" href="">Kontakt</a>
                            <a class="btn btn-link" href="">Menu</a>
                            <a class="btn btn-link" href="">Rezervace</a>
                            <a class="btn btn-link" href="">Privacy Policy</a>
                            <a class="btn btn-link" href="">Terms & Condition</a>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Kontakt</h4>
                            <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                            <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                            <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                            <div class="d-flex pt-2">
                                <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                                <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Otevírací doba</h4>
                            <h5 class="text-light fw-normal">Pondělí - Sobota</h5>
                            <p>9:00 - 23:00</p>
                            <h5 class="text-light fw-normal">Neděle</h5>
                            <p>10:00 - 20:00</p>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Odběr novinek</h4>
                            <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                            <div class="position-relative mx-auto" style="max-width: 400px;">
                                <input class="form-control border-primary w-100 py-3 ps-4 pe-5" type="text" placeholder="Váš email">
                                <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">Přihlásit se</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="copyright">
                        <div class="row">
                            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                                &copy; <a class="border-bottom" href="#">Restoran</a>, Všechna práva vyhrazena. 
                                
                                <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink.
                                If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase
                                the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                                Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a><br><br>
                                Distributed By <a class="border-bottom" href="https://themewagon.com" target="_blank">ThemeWagon</a>
                            </div>
                            <div class="col-md-6 text-center text-md-end">
                                <div class="footer-menu">
                                    <a href="/">Domů</a>
                                    <a href="">Cookies</a>
                                    <a href="">Pomoc</a>
                                    <a href="">FAQ</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->

            <!-- Back to Top -->
            <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
        </div>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="/assets/lib/wow/wow.min.js"></script>
        <script src="/assets/lib/easing/easing.min.js"></script>
        <script src="/assets/lib/waypoints/waypoints.min.js"></script>
        <script src="/assets/lib/counterup/counterup.min.js"></script>
        <script src="/assets/lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="/assets/lib/tempusdominus/js/moment.min.js"></script>
        <script src="/assets/lib/tempusdominus/js/moment-timezone.min.js"></script>
        <script src="/assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

        <!-- Template Javascript -->
        <script src="/assets/js/main.js"></script>
    </body>
</html>
