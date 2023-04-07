@extends('website.master')
@section('body')
    <!-- /navigation -->

    <section class="page-title overlay" style="background-image: url({{ asset('/') }}assets/images/background/page-title.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="text-white font-weight-bold">{{ $training->title }}</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>{{ request()->route()->getName() }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 py-100">
                    <div class="border rounded bg-white">
                        <img class="img-fluid w-100 rounded-top" src="{{ asset($training->image) }}" alt="blog-image">
                        <div class="p-4">
                            <h3>{{ $training->title }}</h3>
                            <ul class="list-inline d-block pb-4 border-bottom mb-3">
                                <li class="list-inline-item text-color">Posted By {{ $training->teacher->name }}</li>
                                <li class="list-inline-item text-color">{{ $training->created_at->format('d-F-Y') }}</li>
                                <li class="list-inline-item text-color">Category: {{ $training->category->name }}</li>
                            </ul>
                            <p>{!! $training->description !!}</p>
                        </div>
                    </div>
                    <div class="py-4 border-bottom mb-100">
                        <div class="row">
                            <div class="col-lg-5 mb-4 mb-lg-0">
                                <!-- share-icon -->
                                <div class="d-flex">
                                    <span class="font-weight-light mt-2 mr-3">Share:</span>
                                    <ul class="list-inline d-inline-block">
                                        <li class="list-inline-item">
                                            <a class="share-icon bg-facebook" href="#">
                                                <i class="ti-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="share-icon bg-twitter" href="#">
                                                <i class="ti-twitter-alt"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="share-icon bg-linkedin" href="#">
                                                <i class="ti-linkedin"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="share-icon bg-google" href="#">
                                                <i class="ti-google"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- comments -->
                    <div>
                        <h4 class="mb-20">Enroll Now</h4>
                        <!-- comment form -->
                        <div>
                            @if($enrollStatus == 0)
                            <form action="{{ route('training.enroll', ['id' => $training->id]) }}" method="post" class="row">
                                @csrf
                                @if(!Session::has('student_id'))
                                    <h4>Enroll Form:</h4>
                                    <p class="mb-30">Your email address will not be published. Required fields are marked *</p>
                                <div class="col-md-12">
                                    <input type="text" class="form-control mb-30" id="user-name" name="name" placeholder="Your name here">
                                    <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                                </div>
                                <div class="col-md-12">
                                    <input type="email" id="user-email" name="email" class="form-control mb-30" placeholder="Your email address here">
                                    <span class="text-danger">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                                </div>
                                <div class="col-md-12">
                                    <input type="number" class="form-control mb-30" id="user-name" name="mobile" placeholder="Your mobile here">
                                    <span class="text-danger">{{ $errors->has('mobile') ? $errors->first('mobile') : '' }}</span>
                                </div>
                                @endif
                                <div class="col-md-12">
                                    <button class="btn btn-sm btn-primary" type="submit" value="send">Confirm Enroll</button>
                                </div>
                            </form>
                            @else
                                <button type="button" class="btn btn-success" disabled>Already Enrolled</button>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <!-- Sidebar -->
                    <div class="bg-white px-4 py-100 sidebar-box-shadow">
                        <!-- Search Widget -->
                        <!--<div class="mb-50">
                            <h4 class="mb-3">Search Here</h4>
                            <div class="search-wrapper">
                                <input type="text" class="form-control" name="search" placeholder="Type Here...">
                            </div>
                        </div>-->
                        <!-- categories -->
                        <div class="mb-50">
                            <h4 class="mb-3">Categories</h4>
                            <ul class="pl-0 mb-0">
                                <li class="border-bottom">
                                    @foreach($categories as $category)
                                    <a href="{{ route('training-category', ['id' => $category->id]) }}" class="d-block text-color py-10">{{ $category->name }}</a>
                                    @endforeach
                                </li>
                            </ul>
                        </div>
                        <!-- Widget Recent Project -->
                        <div class="mb-50">
                            <h4 class="mb-3">Recent Project</h4>
                            <div class="d-flex py-3 border-bottom">
                                <div class="mr-4">
                                    <a href="blog-single.html">
                                        <img class="rounded" src="{{ asset('/') }}assets/images/blog/post-thumb-sm-01.jpg" alt="post-thumb">
                                    </a>
                                </div>
                                <div>
                                    <h6 class="mb-3">
                                        <a class="text-dark" href="blog-single.html">Marketing Strategy 2017-2018.</a>
                                    </h6>
                                    <p class="meta">16 Dec, 2018</p>
                                </div>
                            </div>
                            <div class="d-flex py-3 border-bottom">
                                <div class="mr-4">
                                    <a href="blog-single.html">
                                        <img class="rounded" src="{{ asset('/') }}assets/images/blog/post-thumb-sm-02.jpg" alt="post-thumb">
                                    </a>
                                </div>
                                <div class="content">
                                    <h6 class="mb-3">
                                        <a class="text-dark" href="blog-single.html">Jack Ma & future of E-commerce</a>
                                    </h6>
                                    <p class="meta">16 Dec, 2018</p>
                                </div>
                            </div>
                            <div class="d-flex py-3">
                                <div class="mr-4">
                                    <a href="blog-single.html">
                                        <img class="rounded" src="{{ asset('/') }}assets/images/blog/post-thumb-sm-03.jpg" alt="post-thumb">
                                    </a>
                                </div>
                                <div class="content">
                                    <h6 class="mb-3">
                                        <a class="text-dark" href="blog-single.html">Jack Ma & future of E-commerce</a>
                                    </h6>
                                    <p class="meta">16 Dec, 2018</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
