@extends('frontend.layout.app_layout')

@section('title')
    {{ env('APP_NAME') }} - {{ $data['category'] }}
@endsection

@section('style')
    {{-- <style type="text/css">
        .my-active span {
            background-color: #5cb85c !important;
            color: white !important;
            border-color: #5cb85c !important;
        }

    </style> --}}
@endsection

@section('content')



    <div class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    {{-- <span>Category</span> --}}
                    <h3>{{ $data['category'] }}</h3>
                    <p>We bring you the best in {{ strtolower($data['category']) }}. Sit back as we educate and inform you
                        on latest trends with our well articulated articles.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section bg-white">
        <div class="container">
            <div class="row">
                @if (count($data['posts']) > 0)
                    @foreach ($data['posts'] as $post)
                        <div class="col-lg-4 mb-4">
                            <div class="entry2">
                                <a href="{{ route('details', $post->slug) }}"><img
                                        src="{{ asset($post->image800x549) }}" alt="Image" class="img-fluid rounded"></a>
                                <div class="excerpt">
                                    <span
                                        class="post-category text-white 
                                
                                @switch($data['category']) @case('SPORTS')
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
                                    bg-warning @endswitch
                                
                                
                                mb-3">{{ $data['category'] }}</span>

                                    <h2><a href="{{ route('details', $post->slug) }}">{{ $post->title }}</a></h2>
                                    <div class="post-meta align-items-center text-left clearfix">
                                        <figure class="author-figure mb-0 mr-3 float-left"><img
                                                src="{{ asset($post->user->image665x665) }}" alt="Image"
                                                class="img-fluid"></figure>
                                        <span class="d-inline-block mt-1">By <a
                                                href="{{ route('authorPosts', $post->user->username) }}">{{ $post->user->name }}</a></span>
                                        <span>&nbsp;-&nbsp; @if ($post->published_at !== null)
                                                {{ $post->published_at->format('j F Y') }}
                                            @else
                                                -
                                            @endif
                                        </span>
                                    </div>

                                    <!-- <p>{!! Illuminate\Support\Str::limit($post->content, 200, $end = '....') !!}.</p> -->
                                    <p><a href="{{ route('details', $post->slug) }}">Read More</a></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <h3>No available post</h3>
                @endif

            </div>
            <div class="row text-center pt-5 border-top">
                <div class="col-md-12">
                    <div class="">
                        {{ $data['posts']->links('vendor.pagination.bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
