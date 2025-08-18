@extends('layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="page-title">Edit Book</h3>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('book.index') }}" class="btn btn-primary btn-md">All Books</a>
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
                        <form action="{{ route('book.update', $book -> id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Book Title</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="b_name" value="{{ $book -> b_name }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Author Name</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="auth_name" value="{{ $book -> author }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Isbn</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="isbn" value="{{ $book -> isbn }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Book Copy</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="copies" value="{{ $book -> copies }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Available Copy</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="avail_copy" value="{{ $book -> available_copy }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Description</label>
                                <div class="col-lg-9">
                                    <textarea type="text" class="form-control" name="description">{{ $book -> description }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Book Cover</label>
                                <div class="col-lg-9">
                                    <input type="file" id="prifileImg" class="form-control" name="cover" accept="image/*" > 
                                    <img style="max-width:160px; width:100%; height:auto; " class="mt-4" id="previewImg" src="{{ asset('media/cover/'. $book -> cover) }}" alt="">
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