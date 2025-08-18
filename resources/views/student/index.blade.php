@extends('layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="page-title">All Student</h3>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('student.create') }}" class="btn btn-primary btn-md">Add New Student</a>
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
                                            <th>Student Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Student Id</th>
                                            <th>Address</th>
                                            <th>Photo</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($studentsAll as $student)
                                        <tr>
                                            <td>{{ $loop -> iteration; }}</td>
                                            <td>{{ $student -> st_name }}</td>
                                            <td>{{ $student -> email }}</td>
                                            <td>{{ $student -> phone }}</td>
                                            <td>{{ $student -> student_id }}</td>
                                            <td>
                                                {{ $student -> address }}
                                                <!-- {{ \Carbon\Carbon::parse($student -> created_at) -> diffForHumans() }} -->
                                            </td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    @if($student -> photo != null)
                                                    <img class="avatar-img rounded-circle" src="{{ asset('media/students/'. $student -> photo) }}" alt="User Image" style="width:60px; height:60px; object-fit:cover;">
                                                    @else
                                                    <img class="avatar-img rounded-circle" src="https://placehold.jp/60x80.png?text=Photo" style="width:60px; height:60px; object-fit:cover;" alt="">
                                                    @endif
                                                </h2>
                                            </td>
                                            <td class="text-right">
                                                <div class="actions">
                                                    <a class="btn btn-sm bg-success-light" href="{{ route('student.show', $student -> id) }}">
                                                        <i class="fe fe-eye"></i> Show
                                                    </a>
                                                    <a class="btn btn-sm bg-warning-light mx-2" href="{{ route('student.edit', $student -> id) }}">
                                                        <i class="fe fe-pencil"></i> Edit
                                                    </a>
                                                    <a class="btn btn-sm bg-danger-light deleteBtn" data-id="{{ 'student/'. $student -> id }}" data-toggle="modal" href="#delete_modal">
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