@extends('backend.layouts.auth.app')

@section('title')
    Sign In
@endsection
@section('content')
    <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">
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

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
                <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">INSYDER VOICE
                    {{-- <span
                        class="tx-info tx-normal">admin</span> --}}
                </div>
                <div class="tx-center mg-b-60">Simplicity over complexity</div>

                <div class="form-group">
                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror"
                        name="username" required autofocus placeholder="Enter your username">
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div><!-- form-group -->
                <div class="form-group">
                    <input placeholder="Enter you password" id="password" type="password"
                        class="form-control @error('password') is-invalid @enderror" name="password" required>

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <a href="" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a>
                </div><!-- form-group -->
                <button type="submit" class="btn btn-info btn-block">Sign In</button>
                @if (Route::has('register'))
                    <div class="mg-t-60 tx-center">Not yet a member? <a href="{{ route('register') }}"
                            class="tx-info">Register</a>
                    </div>
                @endif

            </div><!-- login-wrapper -->
        </form>

    </div><!-- d-flex -->
@endsection
