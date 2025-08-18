@extends('layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="page-title">Student Details</h3>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('student.index') }}" class="btn btn-primary btn-md">All Students</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Student Details</li>
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
            <div class="col-md-12">
                <div class="profile-header">
                    <div class="row align-items-center">
                        <div class="col-auto profile-image">
                            <a href="#"> 
                                @if($student -> photo != null)
                                    <img class="rounded-circle" src="{{ asset('media/students/'. $student -> photo) }}" alt="User Image"  >
                                @else
                                    <img src="https://placehold.jp/60x80.png?text=User" alt="">
                                @endif  
                            </a>
                        </div>
                        <div class="col ml-md-n2 profile-user-info">
                            <h4 class="user-name mb-0">{{ $student -> st_name }}</h4>
                            <h6 class="text-muted">{{ $student -> email }}</h6>
                            <div class="user-Location"><i class="fa fa-map-marker"></i> {{ $student -> address }}</div>
                            <div class="about-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                        </div>
                    </div>
                </div>
                <div class="profile-menu">
                    <ul class="nav nav-tabs nav-tabs-solid">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#per_details_tab">About</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content profile-tab-cont">

                    <!-- Personal Details Tab -->
                    <div class="tab-pane fade show active" id="per_details_tab">

                        <!-- Personal Details -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title d-flex justify-content-between">
                                            <span>Personal Details</span>
                                            <a class="edit-link" href="{{ route('student.edit', $student -> id) }}"><i class="fa fa-edit mr-1"></i>Edit</a>
                                        </h5>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Name</p>
                                            <p class="col-sm-10">{{ $student -> st_name }}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Student Id</p>
                                            <p class="col-sm-10">{{ $student -> student_id }}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Email ID</p>
                                            <p class="col-sm-10">{{ $student -> email }}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Mobile</p>
                                            <p class="col-sm-10">{{ $student -> phone }}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-right mb-0">Address</p>
                                            <p class="col-sm-10 mb-0">{{ $student -> address }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Personal Details -->
                    </div>
                    <!-- /Personal Details Tab -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Page Wrapper -->

@endsection