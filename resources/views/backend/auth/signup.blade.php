@extends('backend.layouts.app')
@section('title')
    Register
@endsection

@section('sign_up_css')
    <link rel="stylesheet" href="{{ asset('assets/lib/select2/css/select2.min.css') }}">
    {{-- <link href="../lib/select2/css/select2.min.css" rel="stylesheet"> --}}
@endsection

@section('content')
    <div class="d-flex align-items-center justify-content-center sl-pagebody ht-md-100v">

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="login-wrapper wd-300 wd-xs-400 pd-25 pd-xs-40 bg-white">
                <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">UNDILUTED NEWS <span
                        class="tx-info tx-normal">admin</span>
                </div>
                <div class="tx-center mg-b-60">Register User</div>

                <div class="form-group">
                    <input id="username" placeholder="Enter username" type="text"
                        class="form-control @error('username') is-invalid @enderror" name="username"
                        value="{{ old('username') }}" required autocomplete="username" autofocus>

                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div><!-- form-group -->
                <div class="form-group">
                    <input id="password" type="password" placeholder="Password"
                        class="form-control @error('password') is-invalid @enderror" name="password" required
                        autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div><!-- form-group -->
                <div class="form-group">
                    <input id="password-confirm" type="password" placeholder="Confirm Password"
                        class="form-control @error('password') is-invalid @enderror" name="password_confirmation" required
                        autocomplete="new-password">
                </div><!-- form-group -->

                <div class="form-group">
                    <input id="name" placeholder="Enter name" type="text"
                        class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"
                        required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div><!-- form-group -->
                {{-- <div class="form-group">
                    <label class="d-block tx-11 tx-uppercase tx-medium tx-spacing-1">Birthday</label>
                    <div class="row row-xs">
                        <div class="col-sm-4">
                            <select class="form-control select2" data-placeholder="Month">
                                <option label="Month"></option>
                                <option value="1">January</option>
                                <option value="2">February</option>
                                <option value="3">March</option>
                                <option value="4">April</option>
                                <option value="5">May</option>
                            </select>
                        </div><!-- col-4 -->
                        <div class="col-sm-4 mg-t-20 mg-sm-t-0">
                            <select class="form-control select2" data-placeholder="Day">
                                <option label="Day"></option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div><!-- col-4 -->
                        <div class="col-sm-4 mg-t-20 mg-sm-t-0">
                            <select class="form-control select2" data-placeholder="Year">
                                <option label="Year"></option>
                                <option value="1">2010</option>
                                <option value="2">2011</option>
                                <option value="3">2012</option>
                                <option value="4">2013</option>
                                <option value="5">2014</option>
                            </select>
                        </div><!-- col-4 -->
                    </div><!-- row -->
                </div><!-- form-group --> --}}
                {{-- <div class="form-group tx-12">By clicking the Sign Up button below, you agreed to our privacy policy and
                    terms of use of our website.</div> --}}
                <button type="submit" class="btn btn-info btn-block">Sign Up</button>
                @if (Route::has('login'))
                    <div class="mg-t-40 tx-center">Already have an account? <a href="{{ route('login') }}"
                            class="tx-info">Sign
                            In</a></div>
                @endif


            </div><!-- login-wrapper -->
        </form>


    </div><!-- d-flex -->

@section('sign_up_scripts')
    <script type="text/javascript" src="{{ asset('assets/lib/select2/js/select2.min.js') }}"></script>
    <script>
        $(function() {
            'use strict';

            $('.select2').select2({
                minimumResultsForSearch: Infinity
            });
        });
    </script>
@endsection

@endsection
