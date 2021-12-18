@extends('frontend.layout.app_layout')

@section('title')
    Homepage
@endsection

@section('content')


    <div class="site-section bg-light">
        <div class="container">
            <div class="row align-items-stretch retro-layout-2">

                <div class="col-md-4">
                    @isset($posts[0])
                        <a href="{{ route('details', $posts[0]['slug']) }}" class="h-entry mb-30 v-height gradient"
                            style="background-image: url({{ url($posts[0]['image800x549']) }});">

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
                    @endisset
                    @isset($posts[1])
                        <a href="{{ route('details', $posts[1]['slug']) }}" class="h-entry mb-30 v-height gradient"
                            style="background-image: url({{ url($posts[1]['image800x549']) }});">

                            <div class="text">
                                <h2>{{ $posts[1]['title'] }}</h2>
                                <span class="date">
                                    @if ($posts[1]['published_at'] !== null)
                                        {{ Carbon\Carbon::parse($posts[1]['published_at'])->format('j F Y') }}
                                    @else
                                        -
                                    @endif
                                </span>
                            </div>
                        </a>
                    @endisset
                </div>

                @isset($posts[2])
                    <div class="col-md-4">
                        <a href="{{ route('details', $posts[2]['slug']) }}" class="h-entry img-5 h-100 gradient"
                            style="background-image: url({{ url($posts[2]['image800x1166']) }});">

                            <div class="text">
                                <div class="post-categories mb-3">
                                    {{-- <span class="post-category bg-danger">Travel</span> --}}
                                    <span class="post-category bg-primary">{{ $posts[2]['category']['name'] }}</span>
                                </div>
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
                    </div>
                @endisset
                <div class="col-md-4">
                    @isset($posts[3])
                        <a href="{{ route('details', $posts[3]['slug']) }}" class="h-entry mb-30 v-height gradient"
                            style="background-image: url({{ url($posts[3]['image800x549']) }});">

                            <div class="text">
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
                    @isset($posts[4])
                        <a href="{{ route('details', $posts[4]['slug']) }}" class="h-entry mb-30 v-height gradient"
                            style="background-image: url({{ url($posts[4]['image800x549']) }});">

                            <div class="text">
                                <h2>{{ $posts[4]['title'] }}</h2>
                                <span class="date">
                                    @if ($posts[4]['published_at'] !== null)
                                        {{ Carbon\Carbon::parse($posts[1]['published_at'])->format('j F Y') }}
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

    <div id="app" class="site-section">
        <recent-post-component></recent-post-component>
    </div>

    <div class="site-section bg-light">
        <div class="container">

            <div class="row align-items-stretch retro-layout">
                @isset($posts[5])
                    <div class="col-md-5 order-md-2">
                        <a href="{{ route('details', $posts[5]['slug']) }}" class="hentry img-1 h-100 gradient"
                            style="background-image: url({{ url($posts[5]['image800x1166']) }});">
                            <span class="post-category text-white bg-danger">{{ $posts[5]['category']['name'] }}</span>

                            <div class="text">
                                <h2>{{ $posts[5]['title'] }}</h2>
                                <span class="date">
                                    @if ($posts[5]['published_at'] !== null)
                                        {{ Carbon\Carbon::parse($posts[5]['published_at'])->format('j F Y') }}
                                    @else
                                        -
                                    @endif
                                </span>
                            </div>
                        </a>

                    </div>
                @endisset

                <div class="col-md-7">
                    @isset($posts[6])
                        <a href="{{ route('details', $posts[6]['slug']) }}" class="hentry img-2 v-height mb30 gradient"
                            style="background-image: url({{ url($posts[6]['image800x549']) }});">
                            <span class="post-category text-white bg-success">{{ $posts[6]['category']['name'] }}</span>
                            <div class="text text-sm">
                                <h2>{{ $posts[6]['title'] }}</h2>
                                <span>
                                    @if ($posts[6]['published_at'] !== null)
                                        {{ Carbon\Carbon::parse($posts[6]['published_at'])->format('j F Y') }}
                                    @else
                                        -
                                    @endif
                                </span>
                            </div>
                        </a>
                    @endisset

                    <div class="two-col d-block d-md-flex">
                        @isset($posts[7])
                            <a href="{{ route('details', $posts[7]['slug']) }}" class="hentry v-height img-2 gradient"
                                style="background-image: url({{ url($posts[7]['image800x549']) }});">
                                <span class="post-category text-white bg-primary">{{ $posts[7]['category']['name'] }}</span>

                                <div class="text text-sm">
                                    <h2>{{ $posts[7]['title'] }}</h2>
                                    <span class="date">
                                        @if ($posts[7]['published_at'] !== null)
                                            {{ Carbon\Carbon::parse($posts[7]['published_at'])->format('j F Y') }}
                                        @else
                                            -
                                        @endif
                                    </span>
                                </div>
                            </a>
                        @endisset

                        @isset($posts[8])
                            <a href="{{ route('details', $posts[8]['slug']) }}"
                                class="hentry v-height img-2 ml-auto gradient"
                                style="background-image: url({{ url($posts[8]['image800x549']) }});">
                                <span class="post-category text-white bg-warning">{{ $posts[8]['category']['name'] }}</span>

                                <div class="text text-sm">
                                    <h2>{{ $posts[8]['title'] }}</h2>
                                    <span class="date">
                                        @if ($posts[8]['published_at'] !== null)
                                            {{ Carbon\Carbon::parse($posts[8]['published_at'])->format('j F Y') }}
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
