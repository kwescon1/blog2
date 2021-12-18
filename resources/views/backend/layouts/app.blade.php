<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>@yield('title')</title>

    <!-- vendor css -->
    <link rel="stylesheet" href="{{ asset('assets/backend/lib/font-awesome/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/lib/Ionicons/css/ionicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/lib/perfect-scrollbar/css/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/lib/rickshaw/rickshaw.min.css') }}">

    @yield('table-css')

    @yield('summernote')

    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{ asset('assets/backend/css/starlight.css') }}">
</head>

<body>
    <!-- ########## START: LEFT PANEL ########## -->
    @include('backend.layouts.components.left-panel')
    <!-- sl-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    @include('backend.layouts.components.head-panel')
    <!-- sl-header -->
    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## START: RIGHT PANEL ########## -->
    @include('backend.layouts.components.right-panel')
    <!-- sl-sideright -->
    <!-- ########## END: RIGHT PANEL ########## --->

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">


        @yield('content')

        <footer class="sl-footer">
            <div class="footer-left">
                <script>
                    document.write(new Date().getFullYear());
                </script> All Rights Reserved.</div>
    </div>

    </footer>
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
    <script src="{{ asset('assets/backend/lib/jquery/jquery.js') }}"></script>
    @yield('table-script')
    <script src="{{ asset('assets/backend/lib/popper.js/popper.js') }}"></script>
    <script src="{{ asset('assets/backend/lib/bootstrap/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/backend/lib/jquery-ui/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/backend/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js') }}"></script>
    <script src="{{ asset('assets/backend/lib/jquery.sparkline.bower/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('assets/backend/lib/d3/d3.js') }}"></script>

    {{-- <script src="{{ asset('assets/backend/lib/chart.js/Chart.js') }}"></script>
    <script src="{{ asset('assets/backend/lib/Flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('assets/backend/lib/Flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('assets/backend/lib/Flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('assets/backend/lib/flot-spline/jquery.flot.spline.js') }}"></script> --}}
    <script src="{{ asset('assets/backend/js/ResizeSensor.js') }}"></script>
    @yield('scripts')

    @yield('summernoteJS')

    <script src="{{ asset('assets/backend/js/starlight.js') }}"></script>

</body>

</html>
