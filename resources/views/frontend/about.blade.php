@extends('frontend.layout.app_layout')

@section('title')
    {{ env('APP_NAME') }} - About Us
@endsection

@section('content')
    <div class="site-cover site-cover-sm same-height overlay single-page"
        style="background-image: url('assets/frontend/images/img_4.jpg');">
        <div class="container">
            <div class="row same-height justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="post-entry text-center">
                        <h1 class=""></h1>
                        <p class="lead mb-4 text-white"></p>
                        <br><br><br><br>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="site-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6 order-md-2">
                    <img src="{{ asset('assets/storage/logo_1_4_800x549.jpeg') }}" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-5 mr-auto order-md-1">
                    {{-- <h2>We Love To Explore</h2> --}}
                    <p>A group of persons from diverse career backgrounds and interest but with a common goal of
                        writing musings that inform, inspire and entertain readers.
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="site-section">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-md-5 text-center">
                    <h2>Meet The Team</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus commodi blanditiis, soluta magnam
                        atque laborum ex qui recusandae</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-4 mb-5 text-center">
                    <img src="{{ asset('assets/frontend/images/person_1.jpg') }}" alt="Image"
                        class="img-fluid w-50 rounded-circle mb-4">
                    <h2 class="mb-3 h5">Kate Hampton</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum neque nobis eos quam necessitatibus
                        rerum aliquid est tempore, cupiditate iure at voluptatum dolore, voluptates. Debitis accusamus,
                        beatae ipsam excepturi mollitia.</p>

                    <p class="mt-5">
                        <a href="#" class="p-3"><span class="icon-facebook"></span></a>
                        <a href="#" class="p-3"><span class="icon-instagram"></span></a>
                        <a href="#" class="p-3"><span class="icon-twitter"></span></a>
                    </p>
                </div>

                <div class="col-md-6 col-lg-4 mb-5 text-center">
                    <img src="{{ asset('assets/frontend/images/person_2.jpg') }}" alt="Image"
                        class="img-fluid w-50 rounded-circle mb-4">
                    <h2 class="mb-3 h5">Richard Cook</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum neque nobis eos quam necessitatibus
                        rerum aliquid est tempore, cupiditate iure at voluptatum dolore, voluptates. Debitis accusamus,
                        beatae ipsam excepturi mollitia.</p>

                    <p class="mt-5">
                        <a href="#" class="p-3"><span class="icon-facebook"></span></a>
                        <a href="#" class="p-3"><span class="icon-instagram"></span></a>
                        <a href="#" class="p-3"><span class="icon-twitter"></span></a>
                    </p>
                </div>

                <div class="col-md-6 col-lg-4 mb-5 text-center">
                    <img src="{{ asset('assets/frontend/images/person_3.jpg') }}" alt="Image"
                        class="img-fluid w-50 rounded-circle mb-4">
                    <h2 class="mb-3 h5">Kevin Peters</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum neque nobis eos quam necessitatibus
                        rerum aliquid est tempore, cupiditate iure at voluptatum dolore, voluptates. Debitis accusamus,
                        beatae ipsam excepturi mollitia.</p>

                    <p class="mt-5">
                        <a href="#" class="p-3"><span class="icon-facebook"></span></a>
                        <a href="#" class="p-3"><span class="icon-instagram"></span></a>
                        <a href="#" class="p-3"><span class="icon-twitter"></span></a>
                    </p>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="site-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('assets/storage/logo_1_4_800x549.jpeg') }}" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-5 ml-auto">
                    <h2>Our Aim</h2>
                    <p class="mb-4">Every post is carefully and thoughtfully written</p>

                    <ul class="ul-check list-unstyled success">
                        <li>To inspire the risk averse to take risk</li>
                        <li>Inspire the undecided to take on that course or career path</li>
                        <li>To inform about trends in various sectors</li>
                        <li>To entertain all who read.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    @include('frontend.layout.partials.news_letter')

@endsection
