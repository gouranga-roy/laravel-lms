@extends('layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="page-title">Search Student</h3>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('borrow.index') }}" class="btn btn-primary btn-md">All Borrowing</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Search Student</li>
                    </ul>
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
                        <form action="{{ route('borrow.student') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Student ID</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="student_id" value="{{ old('student_id') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Email</label>
                                <div class="col-lg-9">
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Phone</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <div class="col-lg-3"></div>
                                <div class="col-lg-9 text-right">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            @if($students -> count() > 0)
            @foreach($students as $item)
            <div class="col-12 col-md-3 col-lg-3 d-flex">
                <div class="card flex-fill">
                    <img alt="Card Image" src="{{ asset('media/students/'. $item -> photo) }}" class="card-img-top" style="max-height:260px; object-fit:cover;object-position:top;">
                    <div class="card-body">
                        <h5 class="card-title mb-4">{{ $item -> st_name }}</h5>
                    <a href="{{ route('borrow.assign', $item -> id ) }}" class="btn btn-primary">Assign Book</a>
                    </div>
                </div>
            </div>
            @endforeach
            @else 
                <h2>Data Not Found!</h2>
            @endif
           
        </div>
    </div>
</div>
<!-- /Page Wrapper -->

@endsection