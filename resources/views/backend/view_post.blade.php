@extends('backend.layouts.app')
@section('title')
    New Post
@endsection


@section('content')
    <div class="sl-pagebody">

        <div class="sl-page-title">
            {{-- <h5>New Post</h5> --}}
        </div><!-- sl-page-title -->

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

                            VIEW POST
                        </div>

                        <div class="card-body">
                            <form>

                                <div class="form-group">
                                    <input id="title" placeholder=" Title" type="text"
                                        class="form-control @error('title') is-invalid @enderror" name="title" required
                                        autocomplete="title" autofocus value="{{ $data['post']->title }}">
                                </div><!-- form-group -->

                                {{-- status --}}
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{ $data['post']->category->name }}">
                                </div>

                                <div class="form-group">
                                    <input id="tags" placeholder=" Tags. Separate with comma(,)" type="text"
                                        class="form-control @error('tags') is-invalid @enderror" name="tags" required
                                        value="{{ $data['post']->tags->pluck('name')->implode(',') }}" { autofocus>

                                </div><!-- form-group -->

                                <div id="" class="form-group row">
                                    <label id="" for="information"
                                        class="col-md-12 col-form-label">{{ __('Image Preview') }}</label>

                                    <div class="col-md-12">
                                        <img src="{{ asset($data['post']->image800x549) }}" width="400" height="400"
                                            id="output" />
                                    </div>
                                </div>

                                {{-- status --}}
                                <div class="form-group">
                                    @switch($data['post']->status)
                                        @case(0)
                                            <span class="badge badge-dark">DRAFT</span>

                                        @break

                                        @case(1)
                                            <span class="badge badge-success">PUBLISHED</span>

                                        @break

                                        @case(2)
                                            <span class="badge badge-info">ARCHIVED</span>

                                        @break

                                        @default
                                            <span class="badge badge-dark">DRAFT</span>

                                    @endswitch

                                </div>

                                {{-- content --}}
                                <div class="form-group">
                                    <textarea readonly required id="content" name="content"
                                        class="form-control @error('content') is-invalid @enderror">

                                                                                                            {{ $data['post']->content }}
                                                                                                                                                                                                                         </textarea>
                                </div>

                                <div class="row">
                                    {{-- publish --}}
                                    @if (auth()->user()->roles[0]->hasPermissionTo('can-publish-post') &&
        $data['post']->status == 0)
                                        <a href="{{ route('status.change', [$data['post']->id, 1]) }}"
                                            class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                height="16" fill="currentColor" class="bi bi-arrow-bar-up"
                                                viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M8 10a.5.5 0 0 0 .5-.5V3.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 3.707V9.5a.5.5 0 0 0 .5.5zm-7 2.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5z" />
                                            </svg></a>
                                    @endif

                                    {{-- unpublished --}}
                                    @if (auth()->user()->roles[0]->hasPermissionTo('can-unpublish-post') &&
        $data['post']->status == 1)
                                        <a href="{{ route('status.change', [$data['post']->id, 0]) }}"
                                            class="btn btn-dark"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                height="16" fill="currentColor" class="bi bi-arrow-bar-down"
                                                viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M1 3.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5zM8 6a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 0 1 .708-.708L7.5 12.293V6.5A.5.5 0 0 1 8 6z" />
                                            </svg></a>
                                    @endif

                                    {{-- archive --}}
                                    @if (auth()->user()->roles[0]->hasPermissionTo('can-archive-post') &&
        $data['post']->status == 1)
                                        <a href="{{ route('status.change', [$data['post']->id, 2]) }}"
                                            class="btn btn-info"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                height="16" fill="currentColor" class="bi bi-archive-fill"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM5.5 7h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z" />
                                            </svg></a>
                                    @endif

                                    {{-- unarchive --}}
                                    @if (auth()->user()->roles[0]->hasPermissionTo('can-unarchive-post') &&
        $data['post']->status == 2)
                                        <a href="{{ route('status.change', [$data['post']->id, 1]) }}"
                                            class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                height="16" fill="currentColor" class="bi bi-arrow-90deg-left"
                                                viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M1.146 4.854a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H12.5A2.5 2.5 0 0 1 15 6.5v8a.5.5 0 0 1-1 0v-8A1.5 1.5 0 0 0 12.5 5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4z" />
                                            </svg></a>
                                    @endif
                                    {{-- edit --}}
                                    @if (auth()->user()->roles[0]->hasPermissionTo('can-edit-post'))
                                        <a href="{{ route('posts.edit', $data['post']->id) }}"
                                            class="btn btn-info"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                height="16" fill="currentColor" class="bi bi-pencil-fill"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                            </svg></a>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>

    <script src="https://cdn.tiny.cloud/1/v1cw5i5ly18aizcmlr9c0xpc5q14mepwmg5ps0zgxii32o1d/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'paste emoticons advlist autolink lists link image charmap print preview hr anchor pagebreak codesample directionality wordcount visualchars visualblocks lists advlist bbcode code fullscreen help imagetools importcss insertdatetime media preview searchreplace spellchecker tabfocus table fullpage',
            toolbar_mode: 'floating',
            toolbar: 'code codesample ltr rtl wordcount visualchars visualblocks anchor emoticons fullscreen help hr image insertdatetime link numlist bullist media preview searchreplace spellchecker table tabledelete | tableprops tablerowprops tablecellprops | tableinsertrowbefore tableinsertrowafter tabledeleterow | tableinsertcolbefore tableinsertcolafter tabledeletecol template fullpage',
            content_css: '/my-styles.css',
            spellchecker_rpc_url: 'spellchecker.php'

        });
    </script>
@endsection
