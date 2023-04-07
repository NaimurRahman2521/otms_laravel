@extends('website.master')
@section('title')
    Login - Registration
@endsection
@section('body')
    <section class="page-title overlay" style="background-image: url({{ asset('/') }}assets/images/background/page-title.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="text-white font-weight-bold">Login / Registration</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>Login</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5">
        <h3 class="text-danger text-center">{{ session('message') }}</h3>
    </section>
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="signup">
                        <div class="row">
                            <div class="col-md-5 signup-greeting overlay" style="background-image: url({{ asset('/') }}assets/images/background/signup.jpg);">
                                <img src="{{ asset('/') }}assets/images/logo-signup.png" alt="logo">
                                <h4>Welcome!</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                                    labore et dolore magna.</p>
                            </div>
                            <div class="col-md-7">
                                <div class="signup-form">
                                    <form action="{{ route('student.login') }}" method="post" class="row">
                                        @csrf
                                        <div class="col-12">
                                            <h4>Login</h4>
                                            <p class="float-sm-right">Need An Account?
                                                <a href="signup.html">Sign Up</a>
                                            </p>
                                        </div>
                                        <div class="col-12">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email Address">
                                        </div>
                                        <div class="col-12">
                                            <input type="password" class="form-control" id="pass" name="password" placeholder="Password">
                                        </div>
                                        <div class="col-sm-4">
                                            <button class="btn btn-primary btn-sm">Login</button>
                                        </div>
                                        <div class="col-sm-8 text-sm-right">
                                            <p class="signup-with">Or Login with</p>
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <a href="#" class="bg-facebook">
                                                        <i class="ti-facebook"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="#" class="bg-google">
                                                        <i class="ti-google"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="signup">
                        <div class="row">
                            <div class="col-md-5 signup-greeting overlay" style="background-image: url({{ asset('/') }}assets/images/background/signup.jpg);">
                                <img src="{{ asset('/') }}assets/images/logo-signup.png" alt="logo">
                                <h4>Welcome!</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                                    labore et dolore magna.</p>
                            </div>
                            <div class="col-md-7">
                                <div class="signup-form">
                                    <form action="{{ route('student.register') }}" method="post" class="row">
                                        @csrf
                                        <div class="col-12">
                                            <h4>Sign Up</h4>
                                            <p class="float-sm-right">Already Have Account?
                                                <a href="login.html">Log In</a>
                                            </p>
                                        </div>
                                        <div class="col-12">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                                            <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                                        </div>
                                        <div class="col-12">
                                            <input type="number" class="form-control" id="mobile" name="mobile" placeholder="Mobile">
                                            <span class="text-danger">{{ $errors->has('mobile') ? $errors->first('mobile') : '' }}</span>
                                        </div>
                                        <div class="col-12">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email Address">
                                            <span class="text-danger">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                                        </div>
                                        <div class="col-12">
                                            <input type="password" class="form-control" id="pass" name="password" placeholder="Password">
                                            <span class="text-danger">{{ $errors->has('password') ? $errors->first('password') : '' }}</span>
                                        </div>
                                        <div class="col-sm-4">
                                            <button class="btn btn-primary btn-sm">Sign Up</button>
                                        </div>
                                        <div class="col-sm-8 text-sm-right">
                                            <p class="signup-with">Or Sign Up with</p>
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <a href="#" class="bg-facebook">
                                                        <i class="ti-facebook"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="#" class="bg-google">
                                                        <i class="ti-google"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
