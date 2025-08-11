@extends('layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="page-title">Create New Student</h3>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('student.index') }}" class="btn btn-primary btn-md">All Student</a>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-xl-8 d-flex">
                <div class="card flex-fill">
                    <div class="card-body">
                        <form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Student Name</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="st_name" value="{{ old('st_name') }}">
                                    @error('st_name')
                                        <p class="text text-danger mb-0">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Email Address</label>
                                <div class="col-lg-9">
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                    @error('email')
                                        <p class="text text-danger mb-0">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Phone No</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
                                    @error('phone')
                                        <p class="text text-danger mb-0">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Student Id</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="student_id" value="{{ old('student_id') }}">
                                    @error('student_id')
                                        <p class="text text-danger mb-0">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Address</label>
                                <div class="col-lg-9">
                                    <textarea type="text" class="form-control" name="address">
                                        {{ old('address') }}"
                                    </textarea>
                                    @error('address')
                                        <p class="text text-danger mb-0">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Photo</label>
                                <div class="col-lg-9">
                                    <input type="file" class="form-control" name="photo" value="{{ old('photo') }}">
                                    @error('photo')
                                        <p class="text text-danger mb-0">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3"></div>
                                <div class="col-lg-9">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Page Wrapper -->

@endsection