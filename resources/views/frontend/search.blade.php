@extends('frontend.layout.app_layout')

@section('title')
    Category - name
@endsection

@section('content')



    <div class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    {{-- <span>Category</span> --}}
                    <h3>SEARCH RESULTS</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section bg-white">
        <div class="container">
            <div class="row">
                @if (count($results) > 0)
                    @foreach ($results as $post)
                        <div class="col-lg-4 mb-4">
                            <div class="entry2">
                                <a href="{{ route('details', $post->slug) }}"><img
                                        src="{{ asset($post->image800x549) }}" alt="Image" class="img-fluid rounded"></a>
                                <div class="excerpt">
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

                                    <h2><a href="{{ route('details', $post->slug) }}">{{ $post->title }}</a></h2>
                                    <div class="post-meta align-items-center text-left clearfix">
                                        <figure class="author-figure mb-0 mr-3 float-left"><img
                                                src="{{ asset($post->user->image665x665) }}" alt="Image"
                                                class="img-fluid"></figure>
                                        <span class="d-inline-block mt-1">By <a
                                                href="#">{{ $post->user->name }}</a></span>
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
                    <div class="row">
                        <div class="col-lg-12 mb-4">
                            <div class="entry2">
                                No Results Found
                            </div>
                        </div>
                    </div>
                @endif

            </div>
            <div class="row text-center pt-5 border-top">
                <div class="col-md-12">
                    <div class="">
                        <span>{{ $results->links('vendor.pagination.bootstrap-4') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
