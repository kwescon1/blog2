@extends('backend.layouts.app')
@section('title')
    Users
@endsection

@section('table-css')
    <link href="{{ asset('assets/backend/lib/highlightjs/github.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/backend/lib/datatables/jquery.dataTables.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/backend/lib/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="sl-pagebody">

        <div class="sl-page-title">
            <h5>Users</h5>
        </div><!-- sl-page-title -->

        <div class="container">
            <div class="row">
                <div class="col-md-8">
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
                            Users
                        </div>
                        <div class="card-body">
                            <table id="categories" class="table categories">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">No of posts</th>
                                        <th scope="col">Created At</th>
                                        <th scope="col"> Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @php($i = 1) --}}
                                    @foreach ($users as $user)

                                        <tr>

                                            {{-- <td scope="row">{{ $categories->firstItem() + $loop->index }}</th> --}}
                                            <td scope="row">{{ $user->id - 1 }}</th>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->roles[0]->name }}</td>
                                            <td>{{ count($user->posts) }}</td>
                                            <td>{{ $user->created_at->diffForHumans() }}</td>
                                            <td>
                                                <a href="{{ route('back-users.edit', $user->id) }}"
                                                    class="btn btn-info"><svg xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" fill="currentColor" class="bi bi-pencil-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                                    </svg></a>
                                                <a href="{{ route('softDelete.back-user', $user->id) }}"
                                                    class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" fill="currentColor" class="bi bi-trash2-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M2.037 3.225A.703.703 0 0 1 2 3c0-1.105 2.686-2 6-2s6 .895 6 2a.702.702 0 0 1-.037.225l-1.684 10.104A2 2 0 0 1 10.305 15H5.694a2 2 0 0 1-1.973-1.671L2.037 3.225zm9.89-.69C10.966 2.214 9.578 2 8 2c-1.58 0-2.968.215-3.926.534-.477.16-.795.327-.975.466.18.14.498.307.975.466C5.032 3.786 6.42 4 8 4s2.967-.215 3.926-.534c.477-.16.795-.327.975-.466-.18-.14-.498-.307-.975-.466z" />
                                                    </svg></a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>


                    </div>

                    <div class="card">
                        {{-- trash bin --}}
                        <div class="card-header">
                            Trash Bin
                        </div>
                        <div class="card-body">
                            <table id="categories" class="table categories">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">No of posts</th>
                                        <th scope="col">Deleted At</th>
                                        <th scope="col"> Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @php($i = 1) --}}
                                    @foreach ($trashedUsers as $user)

                                        <tr>
                                            <td scope="row">{{ $user->id }}</th>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->roles[0]->name }}</td>
                                            <td>{{ count($user->posts) }}</td>
                                            <td>{{ $user->deleted_at->diffForHumans() }}</td>
                                            <td>
                                                <div class="row">
                                                    <a href="{{ route('restore.back-user', $user->id) }}"
                                                        class="btn btn-info"><i class="fa fa-window-restore"
                                                            aria-hidden="true"></i></a>
                                                    <form action="{{ route('back-users.destroy', $user->id) }}"
                                                        method="POST">
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
                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                {{-- form --}}
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">

                            @if (session('data'))
                                {{ session('data')['form_name'] }}
                            @else
                                Register User
                            @endif
                        </div>

                        <div class="card-body">
                            <form @if (session('data'))

                                action = "{{ route('back-users.update', session('data')['data']->id) }}"
                                method ="POST"

                            @else action = "{{ route('registerUser') }}" method ="POST" @endif
                                >

                                @csrf
                                @if (session('data'))
                                    {{ method_field('PUT') }}
                                @endif
                                @csrf
                                <div class=" wd-300 pd-25 pd-xs-40 bg-white">

                                    <div class="form-group">
                                        <input id="username" placeholder="Enter username" type="text"
                                            class="form-control @error('username') is-invalid @enderror" name="username"
                                            @if (session('data')) value="{{ session('data')['data']->username }}" readonly @endif required autocomplete="username" autofocus>

                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div><!-- form-group -->
                                    @if (!session('data'))
                                        <div class="form-group">
                                            <input id="password" type="password" placeholder="Password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                autocomplete="new-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div><!-- form-group -->
                                        <div class="form-group">
                                            <input id="password-confirm" type="password" placeholder="Confirm Password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password_confirmation" required autocomplete="new-password">
                                        </div><!-- form-group -->
                                    @endif

                                    <div class="form-group">
                                        <input id="name" placeholder="Enter name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            @if (session('data')) value="{{ session('data')['data']->name }}" @endif required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input id="name" placeholder="Enter email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            @if (session('data')) value="{{ session('data')['data']->email }}" readonly @endif autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input id="name" placeholder="Twitter handle" type="url"
                                            class="form-control @error('twitter') is-invalid @enderror" name="twitter"
                                            @if (session('data')) value="{{ session('data')['data']->twitter }}" readonly @endif autocomplete="twitter" autofocus>

                                        @error('twitter')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input id="linkedIn" placeholder="Linked In" type="url"
                                            class="form-control @error('linkedIn') is-invalid @enderror" name="linkedIn"
                                            @if (session('data')) value="{{ session('data')['data']->linkedIn }}" readonly @endif autocomplete="linkedIn" autofocus>

                                        @error('linkedIn')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input id="instagram" placeholder="Instagram handle" type="url"
                                            class="form-control @error('instagram') is-invalid @enderror" name="instagram"
                                            @if (session('data')) value="{{ session('data')['data']->instagram }}" readonly @endif autocomplete="instagram" autofocus>

                                        @error('instagram')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <select required name="role"
                                            class="form-control @error('role') is-invalid @enderror">

                                            <option>Select a role</option>


                                            @foreach ($roles as $role)

                                                <option @if (session('data') && session('data')['data']->roles[0]->id == $role->id) selected @endif value="{{ $role->id }}">
                                                    {{ $role->name }}</option>
                                            @endforeach

                                        </select>
                                        @error('role')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-info btn-block">@if (session('data')) Update User  @else Register User @endif</button>
                                </div><!-- login-wrapper -->
                            </form>
                        </div>
                    </div>
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

            $('.categories').DataTable({
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
