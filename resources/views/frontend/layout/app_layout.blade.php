<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700|Playfair+Display:400,700,900" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/frontend/fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/owl.theme.default.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/frontend/fonts/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    @yield('style')
</head>

<body>

    <div class="site-wrap">

        <div class="site-mobile-menu">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body">
                <form method="get" action="{{ route('search.post') }}">
                    <div class="row">
                        <input name="param" required type="search" class="form-control border-0 bg-light"
                            placeholder="Search..." />
                    </div>

                </form>
            </div>
        </div>

        <header class="site-navbar" role="banner">
            <div class="container-fluid">
                <div class="row align-items-center">


                    <div class="collapse fade col-12 " id="searchForm">
                        <form method="get" action="{{ route('search.post') }}">
                            <div class="row">
                                <input name="param" required id="search" type="search"
                                    class="form-control border-0 bg-light" placeholder="Search..." />
                            </div>

                        </form>

                    </div>

                    <div class="col-4 site-logo">
                        <a href="{{ route('frontendHome') }}" class="text-black h2 mb-0">INSYDERVOICE</a>
                    </div>
                    @inject('index', 'App\Http\Controllers\JustCategoryController')
                    <div class="col-8 text-right">
                        <nav class="site-navigation" role="navigation">
                            <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block mb-0">
                                @foreach ($index->cats() as $category)

                                    <li><a
                                            href="{{ route('category', $category->name) }}">{{ $category->name }}</a>
                                    </li>

                                @endforeach
                                <li class="d-none d-lg-inline-block"><a href="#searchForm" data-target="#searchForm"
                                        data-toggle="collapse" class="js-search-toggle"><span
                                            class="icon-search"></span></a></li>
                            </ul>
                            <a href="#"
                                class="site-menu-toggle js-menu-toggle text-black d-inline-block d-lg-none"><span
                                    class="icon-menu h3"></span></a>
                        </nav>

                    </div>
                </div>
            </div>

    </div>
    </header>

    @yield('content')

    <div class="site-footer">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-4">
                    <h4 style="font-size:20px" class="footer-heading mb-4">About Us</h4>
                    <p>A group of persons from diverse career backgrounds and interest but with a common goal of writing
                        musings that inform, inspire and entertain readers...</p>
                </div>
                <div class="col-md-3 ml-auto">
                    <!-- <h3 class="footer-heading mb-4">Navigation</h3> -->
                    <ul class="list-unstyled float-left mr-5">
                        <li><a href="{{ route('about') }}">About Us</a></li>
                        <li><a href="#">Advertise</a></li>
                        <li><a href="{{ route('contactUs') }}">Contact us</a></li>
                        <li><a href="#">Subscribes</a></li>
                    </ul>
                    <ul class="list-unstyled float-left">
                        @foreach ($index->cats() as $category)
                            <li><a
                                    href="{{ route('category', $category->name) }}">{{ ucfirst(strtolower($category->name)) }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-4">


                    <div>
                        <h4 style="font-size:20px;" class="footer-heading mb-4">Connect With Us</h4>
                        <p>
                            <a href="#"><span class="icon-facebook pt-2 pr-2 pb-2 pl-0"></span></a>
                            <a href="#"><span class="icon-twitter p-2"></span></a>
                            <a href="#"><span class="icon-instagram p-2"></span></a>
                            <a href="#"><span class="icon-rss p-2"></span></a>
                            <a href="#"><span class="icon-envelope p-2"></span></a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <p>

                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | <a
                            href="{{ route('frontendHome') }}">www.insydervoice.com</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/jquery.magnific-popup.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/frontend/js/bootstrap-datepicker.min.js') }}"></script> --}}
    <script src="{{ asset('assets/frontend/js/aos.js') }}"></script>

    <script src="{{ asset('assets/frontend/js/main.js') }}"></script>


</body>

</html>
