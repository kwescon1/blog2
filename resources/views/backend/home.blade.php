@extends('backend.layouts.app')

@section('title')
    Dashboard
@endsection
@section('content')
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ url('home') }}">Dashboard</a>
        <span class="breadcrumb-item active">Overview</span>
    </nav>

    <div class="sl-pagebody">
        <div class="row row-sm mg-t-20">
            <div class="col-sm-6 col-xl-3">
                <div class="card pd-20 pd-sm-25">
                    <div class="d-flex align-items-center justify-content-between mg-b-10">
                        <h6 class="card-body-title tx-12 tx-spacing-1">Posts</h6>
                        <a href="" class="tx-gray-600 hover-info"><i class="icon ion-more"></i></a>
                    </div><!-- d-flex -->
                    <h2 class="tx-purple tx-lato tx-center mg-b-15">{{ count($data['posts']) }}</h2>
                </div><!-- card -->
            </div><!-- col-3 -->
            <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
                <div class="card bg-purple tx-white pd-25">
                    <div class="d-flex align-items-center justify-content-between mg-b-10">
                        <h6 class="card-body-title tx-12 tx-white-8 tx-spacing-1"> Archived</h6>
                        <a href="" class="tx-white-8 hover-white"><i class="icon ion-more"></i></a>
                    </div><!-- d-flex -->
                    <h2 class="tx-lato tx-center mg-b-15">{{ count($data['archivedPosts']) }}</h2>
                </div><!-- card -->
            </div><!-- col-3 -->
            <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
                <div class="card pd-20 pd-sm-25">
                    <div class="d-flex align-items-center justify-content-between mg-b-10">
                        <h6 class="card-body-title tx-12 tx-spacing-1">Published</h6>
                        <a href="" class="tx-gray-600 hover-info"><i class="icon ion-more"></i></a>
                    </div><!-- d-flex -->
                    <h2 class="tx-teal tx-lato tx-center mg-b-15">{{ count($data['publishedPosts']) }}</h2>
                </div><!-- card -->
            </div><!-- col-3 -->
            <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
                <div class="card bg-teal tx-white pd-25">
                    <div class="d-flex align-items-center justify-content-between mg-b-10">
                        <h6 class="card-body-title tx-12 tx-white-8 tx-spacing-1">Drafts</h6>
                        <a href="" class="tx-white-8 hover-white"><i class="icon ion-more"></i></a>
                    </div><!-- d-flex -->
                    <h2 class="tx-lato tx-center mg-b-15">{{ count($data['drafts']) }}</h2>
                </div><!-- card -->
            </div><!-- col-3 -->
        </div><!-- row -->

        <div class="row row-sm mg-t-20">
            <div class="col-xl-12">
                <div class="card overflow-hidden">
                    <div class="card-header bg-transparent pd-y-20 d-sm-flex align-items-center justify-content-between">
                        <div class="mg-b-20 mg-sm-b-0">
                            <h6 class="card-title mg-b-5 tx-13 tx-uppercase tx-bold tx-spacing-1">Your Statistics</h6>
                            <span class="d-block tx-12">{{ today()->format('j F y') }}</span> </span>
                        </div>
                    </div><!-- card-header -->
                    <div class="card-body pd-0 bd-color-gray-lighter">
                        <div class="row no-gutters tx-center">
                            <div class="col-12 col-sm-4 pd-y-20 tx-left">
                                <p class="pd-l-20 tx-12 lh-8 mg-b-0">Note: Lorem ipsum dolor sit amet, consectetuer
                                    adipiscing elit. Aenean commodo ligula...</p>
                            </div><!-- col-4 -->
                            <div class="col-6 col-sm-2 pd-y-20">
                                <h4 class="tx-inverse tx-lato tx-bold mg-b-5">{{ count($data['user_posts']) }}</h4>
                                <p class="tx-11 mg-b-0 tx-uppercase">Posts</p>
                            </div><!-- col-2 -->
                            <div class="col-6 col-sm-2 pd-y-20 bd-l">
                                <h4 class="tx-inverse tx-lato tx-bold mg-b-5">{{ count($data['user_archivedPosts']) }}
                                </h4>
                                <p class="tx-11 mg-b-0 tx-uppercase"> Archived</p>
                            </div><!-- col-2 -->
                            <div class="col-6 col-sm-2 pd-y-20 bd-l">
                                <h4 class="tx-inverse tx-lato tx-bold mg-b-5">{{ count($data['user_publishedPosts']) }}
                                </h4>
                                <p class="tx-11 mg-b-0 tx-uppercase">Published</p>
                            </div><!-- col-2 -->
                            <div class="col-6 col-sm-2 pd-y-20 bd-l">
                                <h4 class="tx-inverse tx-lato tx-bold mg-b-5">{{ count($data['user_Drafts']) }}</h4>
                                <p class="tx-11 mg-b-0 tx-uppercase">Drafts</p>
                            </div><!-- col-2 -->
                        </div><!-- row -->
                    </div><!-- card-body -->
                    <div class="card-body pd-0">
                        <div id="rickshaw2" class="wd-100p ht-200"></div>
                    </div><!-- card-body -->
                </div><!-- card -->

            </div><!-- col-8 -->
        </div><!-- row -->
    </div><!-- sl-pagebody -->
@endsection

@section('scripts')
    <script src="{{ asset('assets/backend/lib/rickshaw/rickshaw.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/dashboard.js') }}"></script>
@endsection
