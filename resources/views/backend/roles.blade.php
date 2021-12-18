@extends('backend.layouts.app')
@section('title')
    Roles
@endsection

@section('table-css')
    <link href="{{ asset('assets/backend/lib/highlightjs/github.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/backend/lib/datatables/jquery.dataTables.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/backend/lib/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="sl-pagebody">

        <div class="sl-page-title">
            <h5>Roles</h5>
        </div><!-- sl-page-title -->

        <div class="container">
            <div class="row">
                <div class="col-md-8">
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
                            Roles
                        </div>
                        <div class="card-body">
                            <table id="roles" class="table categories">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Created At</th>
                                        <th scope="col">No of Permissions</th>
                                        <th scope="col"> Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @php($i = 1) --}}
                                    @foreach ($roles as $role)

                                        <tr>
                                            <td scope="row">{{ $role->id - 1 }}</th>
                                            <td>{{ $role->name }}</td>
                                            <td>{{ $role->created_at->diffForHumans() }}</td>
                                            <td>{{ count($role->permissions) }}</td>
                                            <td>
                                                <a href="{{ route('back-roles.edit', $role->id) }}"
                                                    class="btn btn-info"><svg xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" fill="currentColor" class="bi bi-pencil-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                                    </svg></a>
                                                @if (auth()->user()->roles[0]->name !== 'Admin')
                                                    <a href="{{ route('softDelete.back-role', $role->id) }}"
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

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">

                            @if (session('data'))
                                {{ session('data')['form_name'] }}
                            @else
                                Add Role
                            @endif
                        </div>

                        <div class="card-body">
                            <form @if (session('data'))

                                action = "{{ route('back-roles.update', session('data')['data']->id) }}"
                                method ="POST"

                            @else action = "{{ route('back-roles.store') }}" method ="POST" @endif
                                >

                                @csrf
                                @if (session('data'))
                                    {{ method_field('PUT') }}
                                @endif
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label"> Name</label>
                                    <input type="text" class="form-control" name="name" @if (session('data'))
                                    value=" {{ session('data')['data']->name }}"
                                    @endif>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                @if (session('data'))
                                    <input hidden value="{{ session('data')['data']->id }}" type="text" name="role_id">
                                @endif
                                {{-- permissions --}}
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label"> Permissions</label>
                                    <div class="">
                                        @foreach ($permissions as $permission)
                                            <label>{{ $permission->item }}</label>
                                            @if (session('data'))
                                                <input value="{{ $permission->id }}" type="checkbox"
                                                    class="" name="permission[]" @if (session('data')['data']->permissions->contains($permission)) checked @endif>
                                            @else
                                                <input value="{{ $permission->id }}" type="checkbox"
                                                    class="" name="permission[]">
                                            @endif
                                        @endforeach
                                    </div>


                                    @error('permission')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">

                                    @if (session('data'))
                                        Update Role
                                    @else
                                        Add Role
                                    @endif
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <!-- Trash-->

        <div class="container">
            <div class="row">
                <div class="col-md-8">
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
                            <table id="roles" class="table categories">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Created At</th>
                                        <th scope="col">Deleted At</th>
                                        <th scope="col"> Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @php($i = 1) --}}
                                    @foreach ($trashedRoles as $role)

                                        <tr>
                                            <td scope="row">{{ $role->id - 1 }}</th>
                                            <td>{{ $role->name }}</td>
                                            <td>{{ $role->created_at->diffForHumans() }}</td>

                                            <td>{{ $role->deleted_at->diffForHumans() }}</td>
                                            <td>
                                                <div class="row">
                                                    <a href="{{ route('restore.back-role', $role->id) }}"
                                                        class="btn btn-info"><i class="fa fa-window-restore"
                                                            aria-hidden="true"></i></a>
                                                    <form action="{{ route('back-roles.destroy', $role->id) }}"
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

            $('.roles').DataTable({
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
