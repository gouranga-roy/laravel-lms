@extends('layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="page-title">All Borrowing</h3>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('borrow.search') }}" class="btn btn-primary btn-md">Add New Borrowing</a>
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
                                            <th>Student</th>
                                            <th>Book</th>
                                            <th>Issue Date</th>
                                            <th>Return Date</th>
                                            <th>Created At</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($borrows as $item)
                                        
                                        @php
                                            $days = ceil(\Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse($item->return_date), false));

                                            if ($days > 0) {
                                                $return_date = abs($days) . ' ' . (abs($days) == 1 ? 'Day' : 'Days');
                                            } elseif ($days === 0) {
                                                $return_date = 'Today';
                                            } else {
                                                $return_date = $days . ' ' . ($days == 1 ? 'Day Left' : 'Days Left');
                                            }


                                        @endphp

                                       

                                        <tr>
                                            <td>{{ $loop -> iteration; }}</td>
                                            <td>
                                                @if($item -> student_photo != null)
                                                    <img class="avatar-img rounded-circle mr-2" src="{{ asset('media/students/'. $item -> student_photo) }}" alt="User Image" style="width:60px; height:60px; object-fit:cover;">
                                                    @else
                                                    <img class="avatar-img rounded-circle mr-2" src="https://placehold.jp/60x80.png?text=Photo" style="width:60px; height:60px; object-fit:cover;" alt="">
                                                @endif

                                                {{ $item -> student_name }}
                                            </td>
                                            <td>
                                                @if($item -> book_cover != null)
                                                    <img class="avatar-img mr-2" src="{{ asset('media/cover/'. $item -> book_cover) }}" alt="User Image" style="width:60px; object-fit:cover;">
                                                    @else
                                                    <img class="avatar-img mr-2" src="https://placehold.jp/60x80.png?text=Photo" style="width:60px; height:60px; object-fit:cover;" alt="">
                                                @endif

                                                {{ $item -> book_name  }}
                                            </td>
                                            <td>{{ date('d M, Y', strtotime($item -> issue_date)) }}</td>
                                            <td> {{ $return_date }}</td>
                                            <td>
                                                @php
                                                    $minutes = \Carbon\Carbon::parse($item -> created_at)->diffForHumans(\Carbon\Carbon::now());

                                                @endphp
                                                {{ $minutes }}
                                            </td>
                                            <td>
                                                @if ($item -> status == "overdue" )
                                                    <p class="badge badge-pill bg-danger inv-badge py-2">{{ $item -> status }}</p>
                                                @elseif($item -> status == "panding")
                                                    <p class="badge badge-pill bg-success inv-badge py-2">{{ $item -> status }}</p>
                                                @elseif($item -> status == "returned") 
                                                    <p class="badge badge-pill bg-warning inv-badge py-2">{{ $item -> status }}</p>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="actions">
                                                    <a class="btn btn-sm bg-warning mx-2" href="{{ route('borrow.returned', $item -> id ) }}">Make Return</a>
                                                    <a class="btn btn-sm bg-danger text-white mx-2" href="#">Make Overdur</a>
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