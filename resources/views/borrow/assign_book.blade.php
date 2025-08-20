@extends('layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="page-title">Assign Book</h3>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('borrow.index') }}" class="btn btn-primary btn-md">All Assign</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Assign Book</li>
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
            <div class="col-md-8">
                <div class="profile-header">
                    <div class="row align-items-center">
                        <div class="col-auto profile-image">
                            <a href="#">
                                @if($student -> photo != null)
                                <img class="rounded-circle" src="{{ asset('media/students/'. $student -> photo) }}" alt="User Image">
                                @else
                                <img src="https://placehold.jp/60x80.png?text=User" alt="">
                                @endif
                            </a>
                        </div>
                        <div class="col ml-md-n2 profile-user-info">
                            <h4 class="user-name mb-0">{{ $student -> st_name }}</h4>
                            <h6 class="text-muted">{{ $student -> email }}</h6>
                            <div class="user-Location"><i class="fa fa-map-marker"></i> {{ $student -> address }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title d-flex justify-content-between">
                            <span>Select Book</span>
                        </h5>
                       <form action="{{ route('borrow.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Select Book</label>
                                <select name="book_id" id="" class="form-control">
                                    @foreach($books as $book)
                                        <option value="{{ $book -> id }}">{{ $book -> b_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Return Date</label>
                                <input type="date" name="return_date" class="form-control">
                                <input type="hidden" name="student_id" value="{{ $student -> id }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Status</label>
                                <select name="status" id="" class="form-control">
                                    <option value="panding">Panding</option>
                                    <option value="returned">Return</option>
                                    <option value="overdue">Overdue</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Assign Book</button>
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Page Wrapper -->

@endsection