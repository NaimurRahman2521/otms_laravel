@extends('website.master')

@section('title')
    All Training
@endsection

@section('body')
    <section class="py-5">
        <div class="container">
            <h5 class="text-center text-success">{{ session('message') }}</h5>
            <div class="row">
                @include('website.student.menu')
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="card card-body text-center">All Trainings</h1>

                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Course Name</th>
                                    <th>Enroll Date</th>
                                    <th>Amount Paid</th>
                                    <th>Enroll Status</th>
                                    <th>Payment Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($enrolls as $enroll)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ substr($enroll->training->title, 0, 20) }}</td>
                                    <td>{{ $enroll->enroll_date }}</td>
                                    <td>{{ $enroll->payment_amount }}</td>
                                    <td><span class="badge badge-warning">{{ $enroll->enroll_status }}</span></td>
                                    <td><span class="badge badge-warning">{{ $enroll->payment_status }}</span></td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
