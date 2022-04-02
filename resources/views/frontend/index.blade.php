@extends('frontend.layout.app_layout')

@section('title')
    {{ env('APP_NAME') }} - Home
@endsection

@section('meta')
    <meta name="description" content="Home of quality content">
    <meta property="og:image" content="{{ asset('assets/storage/logo/logo_1_50_1_496x300.jpeg') }}" />
    <meta property="og:image:secure_url" content="{{ asset('assets/storage/logo/logo_1_50_1_496x300.jpeg') }}" />
    {{-- <meta property="og:image:type" content="image/jpeg" /> --}}
    {{-- <meta property="og:image:width" content="800" />
    <meta property="og:image:height" content="549" /> --}}
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/banner.css') }}">
@endsection
@section('content')
    <div class="site-section bg-light">
        <div class="container">
            <div class="row align-items-stretch retro-layout-2">

                <div class="col-md-4">
                    @isset($firstFive[0])
                        <a href="{{ route('details', $firstFive[0]['slug']) }}" class="h-entry mb-30 v-height gradient"
                            style="background-image: url({{ url($firstFive[0]['image800x549']) }});">

                            <div class="text">
                                <h2>{{ $firstFive[0]['title'] }}</h2>
                                <span class="date">
                                    @if ($firstFive[0]['published_at'] !== null)
                                        {{ Carbon\Carbon::parse($firstFive[0]['published_at'])->format('j F Y') }}
                                    @else
                                        -
                                    @endif
                                </span>
                            </div>
                        </a>
                    @endisset
                    @isset($firstFive[1])
                        <a href="{{ route('details', $firstFive[1]['slug']) }}" class="h-entry mb-30 v-height gradient"
                            style="background-image: url({{ url($firstFive[1]['image800x549']) }});">

                            <div class="text">
                                <h2>{{ $firstFive[1]['title'] }}</h2>
                                <span class="date">
                                    @if ($firstFive[1]['published_at'] !== null)
                                        {{ Carbon\Carbon::parse($firstFive[1]['published_at'])->format('j F Y') }}
                                    @else
                                        -
                                    @endif
                                </span>
                            </div>
                        </a>
                    @endisset
                </div>

                @isset($firstFive[2])
                    <div class="col-md-4">
                        <a href="{{ route('details', $firstFive[2]['slug']) }}" class="h-entry img-5 h-100 gradient"
                            style="background-image: url({{ url($firstFive[2]['image800x1166']) }});">

                            <div class="text">
                                <div class="post-categories mb-3">
                                    {{-- <span class="post-category bg-danger">Travel</span> --}}
                                    <span class="post-category bg-primary">{{ $firstFive[2]['category']['name'] }}</span>
                                </div>
                                <h2>{{ $firstFive[2]['title'] }}</h2>
                                <span class="date">
                                    @if ($firstFive[2]['published_at'] !== null)
                                        {{ Carbon\Carbon::parse($firstFive[2]['published_at'])->format('j F Y') }}
                                    @else
                                        -
                                    @endif
                                </span>
                            </div>
                        </a>
                    </div>
                @endisset
                <div class="col-md-4">
                    @isset($firstFive[3])
                        <a href="{{ route('details', $firstFive[3]['slug']) }}" class="h-entry mb-30 v-height gradient"
                            style="background-image: url({{ url($firstFive[3]['image800x549']) }});">

                            <div class="text">
                                <h2>{{ $firstFive[3]['title'] }}</h2>
                                <span class="date">
                                    @if ($firstFive[3]['published_at'] !== null)
                                        {{ Carbon\Carbon::parse($firstFive[3]['published_at'])->format('j F Y') }}
                                    @else
                                        -
                                    @endif
                                </span>
                            </div>
                        </a>
                    @endisset
                    @isset($firstFive[4])
                        <a href="{{ route('details', $firstFive[4]['slug']) }}" class="h-entry mb-30 v-height gradient"
                            style="background-image: url({{ url($firstFive[4]['image800x549']) }});">

                            <div class="text">
                                <h2>{{ $firstFive[4]['title'] }}</h2>
                                <span class="date">
                                    @if ($firstFive[4]['published_at'] !== null)
                                        {{ Carbon\Carbon::parse($firstFive[1]['published_at'])->format('j F Y') }}
                                    @else
                                        -
                                    @endif
                                </span>
                            </div>
                        </a>
                    @endisset
                </div>

            </div>
        </div>
    </div>
    {{-- <div class="site-section"> --}}
    {{-- <div class="container"> --}}
    {{-- advertisment banner --}}
    <div class="banner-container">

        <div class="banner">
            <div class="shoe">
                <img src="{{ asset('assets/storage/advertisments/sewlovely.png') }}" alt="">
            </div>
            <div class="content">
                <div class="waviy">
                    <h2 class="">
                        <span style="--i:1">S</span>
                        <span style="--i:2">E</span>
                        <span style="--i:3">W</span>
                        <span style="--i:4">L</span>
                        <span style="--i:5">O</span>
                        <span style="--i:6">V</span>
                        <span style="--i:7">E</span>
                        <span style="--i:8">L</span>
                        <span style="--i:9">Y</span>
                        <span style="--i:10">💕</span>
                    </h2>

                </div>

                <h3 id="advert_head" class="animate_link">Thrift Shop</h3>
                <p>Get your affordable thrift clothes from us</p>

                <div class=""><a href="https://www.instagram.com/__sewlovely/" target="_blank"
                        class="btn">Click
                        Here</a></div>

            </div>
            <div class="women">
                <img src="{{ asset('assets/storage/advertisments/women.png') }}" alt="">
            </div>
        </div>

    </div>
    {{-- </div> --}}
    {{-- </div> --}}

    <div id="app" class="site-section bg-light">
        <recent-post-component></recent-post-component>
    </div>

    <div class="site-section bg-light">
        <div class="container">

            <div class="row align-items-stretch retro-layout">
                @isset($posts[0])
                    <div class="col-md-5 order-md-2">
                        <a href="{{ route('details', $posts[0]['slug']) }}" class="hentry img-1 h-100 gradient"
                            style="background-image: url({{ url($posts[0]['image800x1166']) }});">
                            <span class="post-category text-white bg-danger">{{ $posts[0]['category']['name'] }}</span>

                            <div class="text">
                                <h2>{{ $posts[0]['title'] }}</h2>
                                <span class="date">
                                    @if ($posts[0]['published_at'] !== null)
                                        {{ Carbon\Carbon::parse($posts[0]['published_at'])->format('j F Y') }}
                                    @else
                                        -
                                    @endif
                                </span>
                            </div>
                        </a>

                    </div>
                @endisset

                <div class="col-md-7">
                    @isset($posts[1])
                        <a href="{{ route('details', $posts[1]['slug']) }}" class="hentry img-2 v-height mb30 gradient"
                            style="background-image: url({{ url($posts[1]['image800x549']) }});">
                            <span class="post-category text-white bg-success">{{ $posts[1]['category']['name'] }}</span>
                            <div class="text text-sm">
                                <h2>{{ $posts[1]['title'] }}</h2>
                                <span>
                                    @if ($posts[1]['published_at'] !== null)
                                        {{ Carbon\Carbon::parse($posts[1]['published_at'])->format('j F Y') }}
                                    @else
                                        -
                                    @endif
                                </span>
                            </div>
                        </a>
                    @endisset

                    <div class="two-col d-block d-md-flex">
                        @isset($posts[2])
                            <a href="{{ route('details', $posts[2]['slug']) }}" class="hentry v-height img-2 gradient"
                                style="background-image: url({{ url($posts[2]['image800x549']) }});">
                                <span class="post-category text-white bg-primary">{{ $posts[2]['category']['name'] }}</span>

                                <div class="text text-sm">
                                    <h2>{{ $posts[2]['title'] }}</h2>
                                    <span class="date">
                                        @if ($posts[2]['published_at'] !== null)
                                            {{ Carbon\Carbon::parse($posts[2]['published_at'])->format('j F Y') }}
                                        @else
                                            -
                                        @endif
                                    </span>
                                </div>
                            </a>
                        @endisset

                        @isset($posts[3])
                            <a href="{{ route('details', $posts[3]['slug']) }}"
                                class="hentry v-height img-2 ml-auto gradient"
                                style="background-image: url({{ url($posts[3]['image800x549']) }});">
                                <span class="post-category text-white bg-warning">{{ $posts[3]['category']['name'] }}</span>

                                <div class="text text-sm">
                                    <h2>{{ $posts[3]['title'] }}</h2>
                                    <span class="date">
                                        @if ($posts[3]['published_at'] !== null)
                                            {{ Carbon\Carbon::parse($posts[3]['published_at'])->format('j F Y') }}
                                        @else
                                            -
                                        @endif
                                    </span>
                                </div>
                            </a>
                        @endisset
                    </div>

                </div>
            </div>

        </div>
    </div>


    @include('frontend.layout.partials.news_letter')
@endsection

@section('scripts')
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6297431891068563"
        crossorigin="anonymous"></script>
@endsection
