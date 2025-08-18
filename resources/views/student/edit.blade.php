@extends('layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="page-title">Edit Student</h3>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('student.index') }}" class="btn btn-primary btn-md">All Student</a>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <!-- Show Message -->

        <div class="row">
            <div class="col-12">
                @include('layouts.components.message')
            </div>
        </div>

        <div class="row">
            <div class="col-xl-8 d-flex">
                <div class="card flex-fill">
                    <div class="card-body">
                        <form action="{{ route('student.update', $student -> id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Student Name</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="st_name" value="{{ $student -> st_name }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Email Address</label>
                                <div class="col-lg-9">
                                    <input type="email" class="form-control" readonly value="{{ $student -> email }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Phone No</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="phone" value="{{ $student -> phone }}">
                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Student Id</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" readonly value="{{ $student -> student_id }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Address</label>
                                <div class="col-lg-9">
                                    <textarea type="text" class="form-control" name="address">{{ $student -> address }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Photo</label>
                                <div class="col-lg-9">
                                    <input type="file" class="form-control" name="photo">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label"></label>
                                <div class="col-lg-9">
                                    <img src="{{ asset('media/students/'.  $student -> photo) }}" alt="" style="width:160px; height:160px; object-fit:cover;">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3"></div>
                                <div class="col-lg-9">
                                    <button type="submit" class="btn btn-primary">Update</button>
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