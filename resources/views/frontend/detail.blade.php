@extends('frontend.layout.app_layout')

@section('meta')
    <meta name="keywords" content="                                         @foreach ($post->tags as $tag)
    {{ $tag->name }},
    @endforeach">
    <meta name="author" content="{{ $post->user->name }}">
    <meta name="description" content="{!! \Illuminate\Support\Str::limit($post->content, 40, '&raquo') !!}">

    <meta property="og:image" content="{{ asset($post->image800x549) }}" />
    <meta property="og:image:secure_url" content="{{ asset($post->image800x549) }}" />

    <!-- Twitter -->
    {{-- <meta name="twitter:card" content="summary_large_image"> --}}
    {{-- </meta> --}}
    {{-- <meta name="twitter:site" content="@themepixels"> --}}
    {{-- <meta name="twitter:creator" content="@__kwesiKod "> --}}

    {{-- <meta name="twitter:title" content=""> --}}
    {{-- <meta name="twitter:description" content="{{ $post->title }}">
    <meta name="twitter:image" content="{{ asset($post->image800x549) }}"> --}}
@endsection

@section('title')
    {{ $post->title }}
@endsection
@section('style')
<link rel="stylesheet" href="{{ asset('assets/frontend/css/banner.css') }}">@endsection

@section('content')



    <div class="site-cover site-cover-sm same-height overlay single-page"
        style="background-image: url({{ url($post->image800x549) }});">
        <div class="container">
            <div class="row same-height justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="post-entry text-center">
                        <span
                            class="post-category text-white 
                                
                                @switch($post->category->name)
                                    @case('SPORTS')
                                            bg-danger
                                        @break

                                        @case('TECH')
                                        bg-secondary
                                    @break

                                    @case('FINANCE')
                                        bg-success
                                    @break

                                    @case('ENTERTAINMENT')
                                        bg-warning
                                    @break

                                    @case('POLITICS')
                                        bg-danger
                                    @break

                                    @default
                                    bg-warning
                                        
                                @endswitch
                                
                                
                                mb-3">{{ $post->category->name }}</span>

                        <h1 class="mb-4"><a href="#">{{ $post->title }}</a></h1>
                        <div class="post-meta align-items-center text-center">
                            <figure class="author-figure mb-0 mr-3 d-inline-block"><img @if ($post->user->image665x665)
                                src="{{ asset($post->user->image665x665) }}"
                            @else
                                src="{{ asset('assets/frontend/images/dummyIcon.png') }}"
                                @endif
                                alt="Image" class="img-fluid">
                            </figure>
                            <span class="d-inline-block mt-1">By {{ $post->user->name }}</span>
                            <span>&nbsp;-&nbsp; @if ($post->published_at !== null)
                                    {{ $post->published_at->format('j F Y') }}
                                @else
                                    -
                                @endif</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="site-section py-lg">
        <div class="container">

            <div class="row blog-entries element-animate">

                <div id="app" class="col-md-12 col-lg-8 main-content">

                    <div class="post-content-body">
                        {!! $post->content !!}
                    </div>


                    <div class="pt-5">
                        <p>Category: <a
                                href="{{ route('category', $post->category->name) }}">{{ ucfirst(strtolower($post->category->name)) }}</a>
                            Tags:@foreach ($post->tags as $tag) <a href="#">#{{ $tag->name }}</a>, @endforeach </p>
                    </div>

                    <div class="pt-5">
                        <p>
                            <a class="twitter-share-button"
                                href="https://twitter.com/intent/tweet?text={{ $post->title }} - ?url={{ url()->full() }}"
                                data-size="large">
                                Tweet</a>
                            {{-- <a href="https://twitter.com/TwitterDev?ref_src=twsrc%5Etfw"
                                class="twitter-follow-button" data-show-count="false" data-size="large">Follow
                                @TwitterDev</a> --}}
                        </p>
                    </div>


                    <comment-component :post="@json($post->id)"></comment-component>

                </div>

                <!-- END main-content -->

                <div class="col-md-12 col-lg-4 sidebar">
                    <!-- END sidebar-box -->
                    <div class="sidebar-box">
                        <div class="bio text-center">
                            <img @if ($post->user->image665x665)
                            src="{{ asset($post->user->image665x665) }}"
                        @else
                            src="{{ asset('assets/frontend/images/dummyIcon.png') }}"
                            @endif
                            alt="Image" class="img-fluid mb-5">
                            <div class="bio-body">
                                <h3>{{ $post->user->name }}</h3>
                                <p class="mb-4">{{ $post->user->mission }}</p>
                                <p>
                                    @if ($post->user->facebook)
                                        <a href="{{ $post->user->facebook }}" target="_blank"><span
                                                class="icon-facebook pt-2 pr-2 pb-2 pl-0"></span></a>
                                    @endif
                                    @if ($post->user->twitter)
                                        <a href="{{ $post->user->twitter }}" target="_blank"><span
                                                class="icon-twitter p-2"></span></a>
                                    @endif
                                    @if ($post->user->instagram)
                                        <a href="{{ $post->user->instagram }}" target="_blank"><span
                                                class="icon-instagram p-2" target="_blank"></span></a>
                                    @endif
                                    @if ($post->user->linkedIn)
                                        <a href="{{ $post->user->linkedIn }}" target="_blank"><span
                                                class="icon-linkedin p-2"></span></a>
                                    @endif
                                    @if ($post->user->email)
                                        <a href="mailto:{{ $post->user->email }}"><span
                                                class="icon-envelope p-2"></span></a>
                                    @endif
                                </p>

                            </div>
                        </div>
                    </div>
                    <!-- END sidebar-box -->

                    <div class="sidebar-box">
                        <h3 class="heading"> Advertisments</h3>

                        {{-- <div style="background-image: url({{ asset('assets/storage/advertisments/sew.jpeg') }});"
                            class="banner-advert animated tada">

                            <div class="big-text-advert">Sewlovely</div>


                            <div>get your nice and affordable thrift clothes from my wife😀</div>

                            <a href="https://www.instagram.com/__sewlovely/">Click here</a>
                        </div> --}}

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

                                    <div class=""><a href="https://www.instagram.com/__sewlovely/"
                                            target="_blank" class="btn">Click Here</a></div>

                                </div>
                                <div class="women">
                                    <img src="{{ asset('assets/storage/advertisments/women.png') }}" alt="">
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- END sidebar-box -->

                    @if (count($recentPosts) > 0)
                        <div class="sidebar-box">
                            <h3 class="heading"> Recent Posts</h3>
                            <div class="post-entry-sidebar">
                                <ul>
                                    @foreach ($recentPosts as $recentPost)
                                        <li>
                                            <a href="{{ route('details', $recentPost->slug) }}">
                                                <img src="{{ asset($recentPost->image800x549) }}" alt="Image unavailable"
                                                    class="mr-4">
                                                <div class="text">
                                                    <h4>{{ $recentPost->title }}</h4>
                                                    <div class="post-meta">
                                                        <span class="mr-2">
                                                            @if ($recentPost->published_at !== null)
                                                                {{ $recentPost->published_at->format('j F Y') }}
                                                            @else
                                                                -
                                                            @endif
                                                        </span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                    <!-- END sidebar-box -->

                    @include('frontend.partials.categories_partial')
                    <!-- END sidebar-box -->

                    <div class="sidebar-box">
                        <h3 class="heading">Tags</h3>
                        <ul class="tags">
                            @foreach ($post->tags as $tag)
                                <li><a href="#">{{ $tag->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- END sidebar -->

            </div>
        </div>
    </section>

    <div class="site-section bg-light">
        <div class="container">

            <div class="row mb-5">
                <div class="col-12">
                    <h2>Related Posts</h2>
                </div>
            </div>

            <div class="row align-items-stretch retro-layout">
                @if (sizeof($relatedPosts) > 0)
                    @isset($relatedPosts[0])
                        <div class="col-md-5 order-md-2">
                            <a href="{{ route('details', $relatedPosts[0]['slug']) }}" class="hentry img-1 h-100 gradient"
                                style="background-image: url({{ url($relatedPosts[0]['image800x1166']) }});">
                                <span
                                    class="post-category text-white bg-danger">{{ $relatedPosts[0]['category']['name'] }}</span>
                                <div class="text">
                                    <h2>{{ $relatedPosts[0]['title'] }}</h2>
                                    <span>
                                        @if ($relatedPosts[0]['published_at'] !== null)
                                            {{ Carbon\Carbon::parse($relatedPosts[0]['published_at'])->format('j F Y') }}
                                        @else
                                            -
                                        @endif
                                    </span>
                                </div>
                            </a>
                        </div>
                    @endisset

                    <div class="col-md-7">
                        @isset($relatedPosts[1])
                            <a href="{{ route('details', $relatedPosts[1]['slug']) }}"
                                class="hentry img-2 v-height mb30 gradient"
                                style="background-image: url({{ url($relatedPosts[1]['image800x549']) }});">
                                <span
                                    class="post-category text-white bg-success">{{ $relatedPosts[1]['category']['name'] }}</span>
                                <div class="text text-sm">
                                    <h2>{{ $relatedPosts[1]['title'] }}</h2>
                                    <span>
                                        @if ($relatedPosts[1]['published_at'] !== null)
                                            {{ Carbon\Carbon::parse($relatedPosts[1]['published_at'])->format('j F Y') }}
                                        @else
                                            -
                                        @endif
                                    </span>
                                </div>
                            </a>
                        @endisset

                        <div class="two-col d-block d-md-flex">
                            @isset($relatedPosts[2])
                                <a href="{{ route('details', $relatedPosts[2]['slug']) }}"
                                    class="hentry v-height img-2 gradient"
                                    style="background-image: url({{ url($relatedPosts[2]['image800x549']) }});">
                                    <span
                                        class="post-category text-white bg-primary">{{ $relatedPosts[2]['category']['name'] }}</span>
                                    <div class="text text-sm">
                                        <h2>{{ $relatedPosts[2]['title'] }}</h2>
                                        <span>
                                            @if ($relatedPosts[2]['published_at'] !== null)
                                                {{ Carbon\Carbon::parse($relatedPosts[2]['published_at'])->format('j F Y') }}
                                            @else
                                                -
                                            @endif
                                        </span>
                                    </div>
                                </a>
                            @endisset

                            @isset($relatedPosts[3])
                                <a href="{{ route('details', $relatedPosts[3]['slug']) }}"
                                    class="hentry v-height img-2 ml-auto gradient"
                                    style="background-image: url({{ url($relatedPosts[3]['image800x549']) }});">
                                    <span
                                        class="post-category text-white bg-warning">{{ $relatedPosts[3]['category']['name'] }}</span>
                                    <div class="text text-sm">
                                        <h2>{{ $relatedPosts[3]['title'] }}</h2>
                                        <span>
                                            @if ($relatedPosts[3]['published_at'] !== null)
                                                {{ Carbon\Carbon::parse($relatedPosts[3]['published_at'])->format('j F Y') }}
                                            @else
                                                -
                                            @endif
                                        </span>
                                    </div>
                                </a>
                            @endisset
                        </div>

                    </div>
                @else

                    <h3> No related post</h3>

                @endif
            </div>

        </div>
    </div>


    @include('frontend.layout.partials.news_letter')


@endsection

@section('scripts')
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    {{-- <script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js" defer></script> --}}

    {{-- <script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js?lang=css&skin=desert" defer>  </script> --}}
@endsection
