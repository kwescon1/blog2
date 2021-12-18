@extends('backend.layouts.app')
@section('title')
    Change Password
@endsection


@section('content')
    <div class="sl-pagebody">



        <div class="row justify-content-center">
            <div class="col-xl-8">

                <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
                    @if (session()->has('error'))
                        <span class="alert alert-danger">
                            <strong>{{ session()->get('error') }}</strong>
                        </span>
                    @endif
                    @if (session()->has('success'))
                        <span class="alert alert-success">
                            <strong>{{ session()->get('success') }}</strong>
                        </span>
                    @endif
                    <h6 class="card-body-title">Change Password</h6>
                    <p class="mg-b-20 mg-sm-b-30">User - {{ auth()->user()->name }}</p>

                    <form method="POST" action="{{ route('change.password', auth()->user()->id) }}">
                        @csrf

                        <div class="row">
                            <label class="col-sm-4 form-control-label">Current Password: <span
                                    class="tx-danger">*</span></label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="password" class="form-control @error('current_password') is-invalid @enderror"
                                    name="current_password" autocomplete="current_password">
                                @error('current_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div><!-- row -->
                        <div class="row mg-t-20">
                            <label class="col-sm-4 form-control-label">New Password: <span
                                    class="tx-danger">*</span></label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" autocomplete="password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mg-t-20">
                            <label class="col-sm-4 form-control-label">Password Confirmation: <span
                                    class="tx-danger">*</span></label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="password"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    name="password_confirmation" autocomplete="password_confirmation">
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-layout-footer mg-t-30">
                            <button type="submit" class="btn btn-info mg-r-5">Change Password</button>

                        </div><!-- form-layout-footer -->
                    </form>



                </div><!-- card -->
            </div><!-- col-6 -->
        </div><!-- row -->
    @endsection
