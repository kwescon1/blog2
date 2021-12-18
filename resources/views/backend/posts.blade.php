@extends('backend.layouts.app')
@section('title')
    Posts
@endsection

@section('table-css')
    <link href="{{ asset('assets/backend/lib/highlightjs/github.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/backend/lib/datatables/jquery.dataTables.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/backend/lib/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="sl-pagebody">

        <div class="sl-page-title">
            <h5>Posts</h5>
        </div><!-- sl-page-title -->

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                            </symbol>
                        </svg>

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
                            Posts
                        </div>
                        <div class="card-body">
                            <table id="" class="post table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Author</th>
                                        <th scope="col">Created At</th>
                                        <th scope="col">Published At</th>
                                        <th scope="col">Updated At</th>
                                        <th scope="col">Status</th>
                                        <th scope="col"> Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($data['posts'] as $post)

                                        <tr>
                                            <td scope="row">{{ $post->id }}</th>
                                            <td>{{ $post->title }}</td>
                                            <td><img src="{{ asset($post->image800x549) }}" alt="{{ $post->title }}"
                                                    height="60px" width="60px"> </td>
                                            <td>{{ $post->user->name }}</td>
                                            <td>{{ $post->created_at->diffForHumans() }}</td>
                                            <td>{{ $post->published_at ? $post->published_at->format('j F y') : '-' }}
                                            </td>
                                            <td> {{ $post->updated_at->format('j F y') }} </td>
                                            <td> @switch($post->status)
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
                                            </td>
                                            <td>


                                                {{-- view post --}}
                                                <a href="{{ route('posts.show', $post->id) }}"
                                                    class="btn btn-info"><svg xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" fill="currentColor" class="bi bi-binoculars"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M3 2.5A1.5 1.5 0 0 1 4.5 1h1A1.5 1.5 0 0 1 7 2.5V5h2V2.5A1.5 1.5 0 0 1 10.5 1h1A1.5 1.5 0 0 1 13 2.5v2.382a.5.5 0 0 0 .276.447l.895.447A1.5 1.5 0 0 1 15 7.118V14.5a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 14.5v-3a.5.5 0 0 1 .146-.354l.854-.853V9.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v.793l.854.853A.5.5 0 0 1 7 11.5v3A1.5 1.5 0 0 1 5.5 16h-3A1.5 1.5 0 0 1 1 14.5V7.118a1.5 1.5 0 0 1 .83-1.342l.894-.447A.5.5 0 0 0 3 4.882V2.5zM4.5 2a.5.5 0 0 0-.5.5V3h2v-.5a.5.5 0 0 0-.5-.5h-1zM6 4H4v.882a1.5 1.5 0 0 1-.83 1.342l-.894.447A.5.5 0 0 0 2 7.118V13h4v-1.293l-.854-.853A.5.5 0 0 1 5 10.5v-1A1.5 1.5 0 0 1 6.5 8h3A1.5 1.5 0 0 1 11 9.5v1a.5.5 0 0 1-.146.354l-.854.853V13h4V7.118a.5.5 0 0 0-.276-.447l-.895-.447A1.5 1.5 0 0 1 12 4.882V4h-2v1.5a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V4zm4-1h2v-.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5V3zm4 11h-4v.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5V14zm-8 0H2v.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5V14z" />
                                                    </svg></a>


                                                {{-- publish --}}
                                                @if (auth()->user()->roles[0]->hasPermissionTo('can-publish-post') &&
        $post->status == 0)
                                                    <a href="{{ route('status.change', [$post->id, 1]) }}"
                                                        class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg"
                                                            width="16" height="16" fill="currentColor"
                                                            class="bi bi-arrow-bar-up" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd"
                                                                d="M8 10a.5.5 0 0 0 .5-.5V3.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 3.707V9.5a.5.5 0 0 0 .5.5zm-7 2.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5z" />
                                                        </svg></a>
                                                @endif

                                                {{-- unpublished --}}
                                                @if (auth()->user()->roles[0]->hasPermissionTo('can-unpublish-post') &&
        $post->status == 1)
                                                    <a href="{{ route('status.change', [$post->id, 0]) }}"
                                                        class="btn btn-dark"><svg xmlns="http://www.w3.org/2000/svg"
                                                            width="16" height="16" fill="currentColor"
                                                            class="bi bi-arrow-bar-down" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd"
                                                                d="M1 3.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5zM8 6a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 0 1 .708-.708L7.5 12.293V6.5A.5.5 0 0 1 8 6z" />
                                                        </svg></a>
                                                @endif

                                                {{-- archive --}}
                                                @if (auth()->user()->roles[0]->hasPermissionTo('can-archive-post') &&
        $post->status == 1)
                                                    <a href="{{ route('status.change', [$post->id, 2]) }}"
                                                        class="btn btn-info"><svg xmlns="http://www.w3.org/2000/svg"
                                                            width="16" height="16" fill="currentColor"
                                                            class="bi bi-archive-fill" viewBox="0 0 16 16">
                                                            <path
                                                                d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM5.5 7h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z" />
                                                        </svg></a>
                                                @endif

                                                {{-- unarchive --}}
                                                @if (auth()->user()->roles[0]->hasPermissionTo('can-unarchive-post') &&
        $post->status == 2)
                                                    <a href="{{ route('status.change', [$post->id, 1]) }}"
                                                        class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg"
                                                            width="16" height="16" fill="currentColor"
                                                            class="bi bi-arrow-90deg-left" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd"
                                                                d="M1.146 4.854a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H12.5A2.5 2.5 0 0 1 15 6.5v8a.5.5 0 0 1-1 0v-8A1.5 1.5 0 0 0 12.5 5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4z" />
                                                        </svg></a>
                                                @endif
                                                {{-- edit --}}
                                                @if (auth()->user()->roles[0]->hasPermissionTo('can-edit-post'))
                                                    <a href="{{ route('posts.edit', $post->id) }}"
                                                        class="btn btn-info"><svg xmlns="http://www.w3.org/2000/svg"
                                                            width="16" height="16" fill="currentColor"
                                                            class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                            <path
                                                                d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                                        </svg></a>
                                                @endif
                                                {{-- delete --}}
                                                @if (auth()->user()->roles[0]->hasPermissionTo('can-delete-post'))
                                                    <a href="{{ route('softDelete.post', $post->id) }}"
                                                        class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg"
                                                            width="16" height="16" fill="currentColor"
                                                            class="bi bi-trash2-fill" viewBox="0 0 16 16">
                                                            <path
                                                                d="M2.037 3.225A.703.703 0 0 1 2 3c0-1.105 2.686-2 6-2s6 .895 6 2a.702.702 0 0 1-.037.225l-1.684 10.104A2 2 0 0 1 10.305 15H5.694a2 2 0 0 1-1.973-1.671L2.037 3.225zm9.89-.69C10.966 2.214 9.578 2 8 2c-1.58 0-2.968.215-3.926.534-.477.16-.795.327-.975.466.18.14.498.307.975.466C5.032 3.786 6.42 4 8 4s2.967-.215 3.926-.534c.477-.16.795-.327.975-.466-.18-.14-.498-.307-.975-.466z" />
                                                        </svg></a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <!-- Trash-->

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                            </symbol>
                        </svg>


                        <div class="card-header">
                            Trash Bin
                        </div>
                        <div class="card-body">
                            <table id="" class="post table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Author</th>
                                        <th scope="col">Deleted At</th>
                                        <th scope="col">Deleted By</th>
                                        <th scope="col"> Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @php($i = 1) --}}
                                    @foreach ($data['trashedPosts'] as $post)

                                        <tr>
                                            <td scope="row">{{ $post->id }}</th>
                                            <td>{{ $post->title }}</td>
                                            <td><img src="{{ asset($post->image800x549) }}" alt="{{ $post->title }}"
                                                    height="60px" width="60px"> </td>
                                            <td>{{ $post->user->name }}</td>
                                            <td>@if ($post->deleted_at){{ $post->deleted_at->diffForHumans() }}@else - @endif</td>
                                            <td>{{ $post->userDeleted->name }}</td>
                                            <td>
                                                <div class="row">
                                                    @if (auth()->user()->roles[0]->hasPermissionTo('can-edit-post'))
                                                        <a href="{{ route('restore.post', $post->id) }}"
                                                            class="btn btn-info"><i class="fa fa-window-restore"
                                                                aria-hidden="true"></i></a>
                                                    @endif
                                                    @hasanyrole('Super Admin|Admin')
                                                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                                            @csrf
                                                            {{ method_field('DELETE') }}
                                                            <button type="submit" class="btn btn-danger">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                                    fill="currentColor" class="bi bi-trash2-fill"
                                                                    viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M2.037 3.225A.703.703 0 0 1 2 3c0-1.105 2.686-2 6-2s6 .895 6 2a.702.702 0 0 1-.037.225l-1.684 10.104A2 2 0 0 1 10.305 15H5.694a2 2 0 0 1-1.973-1.671L2.037 3.225zm9.89-.69C10.966 2.214 9.578 2 8 2c-1.58 0-2.968.215-3.926.534-.477.16-.795.327-.975.466.18.14.498.307.975.466C5.032 3.786 6.42 4 8 4s2.967-.215 3.926-.534c.477-.16.795-.327.975-.466-.18-.14-.498-.307-.975-.466z" />
                                                                </svg>
                                                            </button>
                                                        </form>
                                                    @endhasanyrole
                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">

                </div>
            </div>
        </div>
    </div>

@endsection
@section('table-script')

    <script type="text/javascript" src="{{ asset('assets/backend/lib/datatables/jquery.dataTables.js') }}"></script>
    <script type="text/javascript"
        src="{{ asset('assets/backend/lib/datatables-responsive/dataTables.responsive.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('assets/backend/lib/select2/js/select2.min.js') }}"></script>
    <script type="text/javascript">
        $(function() {
            'use strict';

            $('.post').DataTable({
                responsive: true,
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                    lengthMenu: '_MENU_ items/page',
                }
            });

            // Select2
            $('.dataTables_length select').select2({
                minimumResultsForSearch: Infinity
            });

        });
    </script>
    <script type="text/javascript" src="{{ asset('assets/backend/lib/highlightjs/highlight.pack.js') }}"></script>
@endsection
