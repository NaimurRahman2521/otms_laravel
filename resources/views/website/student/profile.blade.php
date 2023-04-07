@extends('website.master')

@section('title')
    Student Profile
@endsection

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                @include('website.student.menu')
                <div class="col-md-9">
                    <div class="card card-body">
                        <h1 class="card card-body text-center">My Profile</h1>
                        <div class="table-responsive">
                            <table class="table table-nowrap mb-0">
                                <tbody>
                                <form action="{{ route('student.update-profile') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                <tr class="text-center">
                                    <td colspan="2"><img src="{{ asset($student->image) }}" alt="Loading.." height="210" width="220"></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><input type="file" class="form-control" name="image"></td>
                                </tr>
                                <tr>
                                    <th scope="row">Full Name :</th>
                                    <td><input type="text" class="form-control" name="name" value="{{ $student->name }}"></td>
                                </tr>
                                <tr>
                                    <th scope="row">Mobile :</th>
                                    <td><input type="text" class="form-control" name="mobile" value="{{ $student->mobile }}"></td>
                                </tr>
                                <tr>
                                    <th scope="row">E-mail :</th>
                                    <td><input type="text" class="form-control" value="{{ $student->email }}" disabled/></td>
                                </tr>
                                <tr>
                                    <th scope="row">Location :</th>
                                    <td><textarea class="form-control" name="address" row="10" cols="20">{{ $student->address }}</textarea></td>
                                </tr>
                                <tr>
                                    <th scope="row">Date Of Birth :</th>
                                    <td><input type="date" class="form-control" name="date_of_birth" value="{{ $student->date_of_birth }}"></td>
                                </tr>
                                <tr>
                                    <th scope="row">NID :</th>
                                    <td><input type="number" class="form-control" name="nid" value="{{ $student->nid }}"></td>
                                </tr>
                                <tr>
                                    <th scope="row">Gender :</th>
                                    <td>
                                        <label><input type="radio" name="gender" value="male" {{ $student->gender == 'male' ? 'checked' : '' }}>Male</label>
                                        <label><input type="radio" name="gender" value="female" {{ $student->gender == 'female' ? 'checked' : '' }}>Female</label>
                                        <label><input type="radio" name="gender" value="other" {{ $student->gender == 'other' ? 'checked' : '' }}>Other</label>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"></th>
                                    <td><input type="submit" class="btn btn-danger btn-sm"></td>
                                </tr>
                                </form>
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
