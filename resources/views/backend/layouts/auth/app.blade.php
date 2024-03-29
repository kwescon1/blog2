<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    {{-- <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Starlight">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png"> --}}

    <!-- Facebook -->
    {{-- <meta property="og:url" content="http://themepixels.me/starlight">
    <meta property="og:title" content="Starlight">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600"> --}}

    <!-- Meta -->
    <meta property="og:title" content="InsyderVoice">
    <meta name="description" content="Simplicity over complexity">
    {{-- <meta name="author" content="ThemePixels"> --}}

    <title>@yield('title')</title>

    <!-- vendor css -->
    <link rel="stylesheet" href="{{ asset('assets/backend/lib/font-awesome/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/lib/Ionicons/css/ionicons.css') }}">

    @yield('sign_up_css')


    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{ asset('assets/backend/css/starlight.css') }}">

<body>
    @yield('content')


    <script src="{{ asset('assets/backend/lib/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/backend/llib/popper.js/popper.js') }}"></script>
    <script src="{{ asset('assets/backend/lib/bootstrap/bootstrap.js') }}"></script>

    @yield('sign_up_scripts')

</body>

</html>
