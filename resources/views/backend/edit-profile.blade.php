@extends('backend.layouts.app')
@section('title')
    Edit Profile
@endsection


@section('content')
    <div class="sl-pagebody">



        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Edit Profile</h6>

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
            <div class="form-layout">

                <form enctype="multipart/form-data" method="POST" action="{{ route('edit.profile', auth()->user()->id) }}">
                    @csrf
                    <div class="row mg-b-25">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Username: <span class="tx-danger">*</span></label>
                                <input id="username" placeholder="Username" type="text"
                                    class="form-control @error('username') is-invalid @enderror" name="username"
                                    value="{{ $user->username }}" required autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Email:</label>
                                <input id="email" placeholder="Email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ $user->email }}" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Instagram: </label>
                                <input id="instagram" placeholder="Instagram" type="url"
                                    class="form-control @error('instagram') is-invalid @enderror" name="instagram"
                                    value="{{ $user->instagram }}" autofocus>

                                @error('instagram')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Twitter: </label>
                                <input id="twitter" placeholder="Twitter" type="url"
                                    class="form-control @error('twitter') is-invalid @enderror" name="twitter"
                                    value="{{ $user->twitter }}" autofocus>

                                @error('twitter')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">LinkedIn:</label>
                                <input id="linkedIn" placeholder="LinkedIn" type="url"
                                    class="form-control @error('linkedIn') is-invalid @enderror" name="linkedIn"
                                    value="{{ $user->linkedIn }}" autofocus>

                                @error('linkedIn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Image:</label>
                                <input type="file" accept="image/*" onchange="loadFile(event)"
                                    class="form-control @error('image') is-invalid @enderror" name="image">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Mission: </label>
                                <textarea rows="10" class="form-control @error('mission') is-invalid @enderror"
                                    name="mission" autofocus></textarea>
                                @error('mission')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Image Preview: </label>
                                <div class="col-md-12">
                                    <img src="{{ asset($user->image665x665) }}" width="300" height="300" id="output" />
                                </div>
                            </div>
                        </div>


                    </div><!-- row -->

                    <div class="form-layout-footer">
                        <button class="btn btn-info mg-r-5">Update Profile</button>
                    </div><!-- form-layout-footer -->
                </form>


            </div><!-- form-layout -->
        </div><!-- card -->

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
