@extends('layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="page-title">All Books</h3>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('book.create') }}" class="btn btn-primary btn-md">Add New Book</a>
                </div>
            </div>
        </div>

        <!-- Show Message -->
        <div class="row">
            <div class="col-12">
                @include('layouts.components.message')
            </div>
        </div>

        <!-- /Page Header -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="table-responsive">
                                <table class="datatable table table-hover table-center mb-0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Book</th>
                                            <th>Author</th>
                                            <th>Isbn</th>
                                            <th>Copies</th>
                                            <th>Available Copy</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($booksAll as $book)
                                        <tr>
                                            <td>{{ $loop -> iteration; }}</td>
                                            <td>
                                                <h2 class="table-avatar pr-2">
                                                    @if($book -> cover != null)
                                                    <img class="avatar-img" src="{{ asset('media/cover/'. $book -> cover) }}" alt="User Image" style="max-width:60px; height:auto; object-fit:cover;">
                                                    @else
                                                    <img src="https://placehold.jp/60x80.png?text=Cover" alt="">
                                                    @endif
                                                </h2>
                                                {{ $book -> b_name }}
                                            </td>
                                            <td>{{ $book -> author }}</td>
                                            <td>{{ $book -> isbn }}</td>
                                            <td>{{ $book -> copies }}</td>
                                            <td>{{ $book -> available_copy }}</td>
                                            <td>
                                                @php
                                                    $minutes = \Carbon\Carbon::parse($book -> created_at)->diffForHumans(\Carbon\Carbon::now());

                                                @endphp
                                                {{ $minutes }}

                                            </td>
                                            <td>
                                                <div class="actions">
                                                    <a class="btn btn-sm bg-success-light" href="{{ route('book.show', $book -> id) }}">
                                                        <i class="fe fe-eye"></i> Show
                                                    </a>
                                                    <a class="btn btn-sm bg-warning-light mx-2" href="{{ route('book.edit', $book -> id) }}">
                                                        <i class="fe fe-pencil"></i> Edit
                                                    </a>
                                                     <a class="btn btn-sm bg-danger-light deleteBtn" data-id="{{ 'book/'. $book -> id }}" data-toggle="modal" href="#delete_modal">
                                                        <i class="fe fe-trash"></i> Delete
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Page Wrapper -->

<!-- Delete Modal -->
<div class="modal fade" id="delete_modal" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document" >
        <div class="modal-content">
            <div class="modal-body">
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="form-content p-2">
                        <h4 class="modal-title">Delete</h4>
                        <p class="mb-4">Are you sure want to delete?</p>
                        <p id="getId"></p>
                        <button type="button" class="btn btn-danger mr-2" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary ml-2">Delete! </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Delete Modal -->

@endsection