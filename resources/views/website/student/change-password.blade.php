@extends('website.master')

@section('title')
    Change password
@endsection

@section('body')
    <section class="py-5">
        <div class="container">
            <h5 class="text-center text-success">{{ session('message') }}</h5>
            <div class="row">
                @include('website.student.menu')
                <div class="col-md-9">
                    <div class="card card-body">
                        <h1 class="card card-body text-center">Change Password</h1>
                        <form action="{{ route('student.update-password') }}" method="post" class="row">
                            @csrf
                            <div class="col-12">
                                <input type="password" class="form-control" id="pass" name="old" placeholder="Old password">
                                <span class="text-danger">{{ $errors->has('old') ? $errors->first('old') : '' }}</span>
                            </div>
                            <div class="col-12">
                                <input type="password" class="form-control" id="pass" name="new" placeholder="New password">
                                <span class="text-danger">{{ $errors->has('new') ? $errors->first('new') : '' }}</span>
                            </div>
                            <div class="col-12">
                                <input type="password" class="form-control" id="pass" name="password" placeholder="Confirm Password">
                                <span class="text-danger">{{ $errors->has('password') ? $errors->first('password') : '' }}</span>
                            </div>
                            <div class="col-sm-4">
                                <button class="btn btn-primary btn-sm">Change Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
