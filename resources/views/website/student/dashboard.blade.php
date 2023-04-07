@extends('website.master')

@section('title')
    Student Dashboard
@endsection

@section('body')
    <section class="py-5">
        <div class="container">
            <h5 class="text-center text-success">{{ session('message') }}</h5>
            <div class="row">
                @include('website.student.menu')
                <div class="col-md-9">
                    <div class="card card-body">
                        <h1 class="card card-body text-center">My Dashboard</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
