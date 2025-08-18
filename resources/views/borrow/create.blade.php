@extends('layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="page-title">Create New Borrow</h3>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('borrow.index') }}" class="btn btn-primary btn-md">All Borrow</a>
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
                        <form action="{{ route('borrow.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Title</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="b_name" value="{{ old('b_name') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Name</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="auth_name" value="{{ old('auth_name') }}">
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