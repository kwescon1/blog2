@extends('backend.layouts.app')
@section('title')
    Post
@endsection
@section('summernote')
    <link href="{{ asset('assets/backend/lib/highlightjs/github.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/backend/lib/summernote/summernote-bs4.css') }}" rel="stylesheet">

@endsection

@section('content')
    <div class="sl-pagebody">

        {{-- <div class="sl-page-title">
            <h5>Post</h5>
        </div><!-- sl-page-title --> --}}

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show align-items-center" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <div class="d-flex align-items-center justify-content-start">
                                    <i class="icon ion-ios-checkmark alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
                                    <span><strong>{{ session('success') }}</strong></span>
                                </div><!-- d-flex -->
                            </div><!-- alert -->
                        @endif

                        <div class="card-header">

                            {{ $data['type'] }}
                        </div>

                        <div class="card-body">
                            <form enctype="multipart/form-data" @if ($data['type'] == 'EDIT POST')
                                action="{{ route($data['route_name']['route'], $data['route_name']['id']) }}"
                            @else
                                action="{{ route($data['route_name']) }}"
                                @endif

                                method="POST">

                                @csrf
                                @if ($data['type'] == 'EDIT POST')
                                    {{ method_field('PUT') }}
                                @endif

                                <div class="form-group">
                                    <input id="title" placeholder=" Title" type="text"
                                        class="form-control @error('title') is-invalid @enderror" name="title" required
                                        autocomplete="title" autofocus @if ($data['type'] == 'EDIT POST') value="{{ $data['post']->title }}" @endif>

                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div><!-- form-group -->

                                {{-- status --}}
                                <div class="form-group">
                                    <select id="category" class="form-control @error('category_id') is-invalid @enderror"
                                        name="category_id">
                                        @foreach ($data['categories'] as $category)
                                            <option @if ($data['type'] == 'EDIT POST' && $data['post']->category->id == $category->id) selected @endif value="{{ $category->id }}">
                                                {{ $category->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('category_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input id="tags" placeholder=" Tags. Separate with comma(,)" type="text"
                                        class="form-control @error('tags') is-invalid @enderror" name="tags" required
                                        @if ($data['type'] == 'EDIT POST')
                                    value="{{ $data['post']->tags->pluck('name')->implode(',') }}" {
                                    @endif autofocus>

                                    @error('tags')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div><!-- form-group -->


                                <div id="" class="form-group row">
                                    <label id="" for="" class="col-md-12 col-form-label">{{ __('Post Image') }}</label>

                                    <div class="col-md-12">

                                        <input id="" type="file" accept="image/*" onchange="loadFile(event)"
                                            class=" @error('image') is-invalid @enderror" @if ($data['type'] == 'NEW POST') required @endif
                                            name="image">

                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>

                                <div id="" class="form-group row">
                                    <label id="" for="information"
                                        class="col-md-12 col-form-label">{{ __('Image Preview') }}</label>

                                    <div class="col-md-12">
                                        <img @if ($data['type'] == 'EDIT POST')src="{{ asset($data['post']->image800x549) }}"@endif width="400" height="400" id="output" />
                                    </div>
                                </div>

                                {{-- status --}}
                                <div class="form-group">
                                    <select id="status" class="form-control @error('status') is-invalid @enderror"
                                        name="status">
                                        <option value="0">Draft</option>
                                        @if (auth()->user()->roles[0]->hasPermissionTo('can-publish-post'))
                                            <option value="1">Publish</option>
                                        @endif
                                    </select>

                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                {{-- content --}}
                                <div class="form-group">
                                    <textarea required id="summernote" name="content"
                                        class="form-control @error('content') is-invalid @enderror">
                                                                                                                                                    @if ($data['type'] == 'EDIT POST') 
                                                                                                                                                        {{ $data['post']->content }}
                                                                                                                                                    @endif                                                            
                                                                                                                                                </textarea>

                                    @error('content')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">


                                    {{ $data['type'] }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
@endsection

@section('summernoteJS')
    <script src="{{ asset('assets/backend/lib/highlightjs/highlight.pack.js') }}"></script>
    <script src="{{ asset('assets/backend/lib/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $(function() {
            'use strict';

            // Summernote editor
            $('#summernote').summernote({
                height: 150,
                tooltip: false,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                ],
                fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Times New Roman',
                    'Tahoma', 'Serif', 'Sans', 'sans-serif'
                ],
            })
        });
    </script>

@endsection
