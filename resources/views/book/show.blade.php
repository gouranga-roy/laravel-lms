@extends('layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="page-title">Book Details</h3>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('book.index') }}" class="btn btn-primary btn-md">All Books</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('book.index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Book Details</li>
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
            <div class="col-12 col-md-8 col-lg-8 d-flex">
                <div class="card flex-fill">
                    <div class="row">
                        <div class="col-5">
                            @if($book -> cover != null)
                                <img class="card-img-top" src="{{ asset('media/cover/'. $book -> cover) }}" alt="User Image"  >
                                @else
                                <img src="https://placehold.jp/60x80.png?text=Cover" alt="">
                            @endif 
                        </div>
                        <div class="col-7">
                            <h2 class="card-title pt-4 mt-4">{{ $book -> b_name }}</h2>
                            <p><b>By : </b> {{ $book -> author }}</p>
                            <p> {{ $book -> description }}</p>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Copies: {{ $book -> copies }} </li>
                                <li class="list-group-item">Available Copy: {{ $book -> available_copy }}</li>
                                <li class="list-group-item">Isbn No: {{ $book -> isbn }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Page Wrapper -->

@endsection