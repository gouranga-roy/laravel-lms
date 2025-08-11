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

        <!-- Show Success Message -->

        <div class="row">
            <div class="col-12">
                @if (Session('success'))
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        {!! Session('success') !!}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
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
                                            <th>Patient ID</th>
                                            <th>Patient Name</th>
                                            <th>Age</th>
                                            <th>Address</th>
                                            <th>Phone</th>
                                            <th>Last Visit</th>
                                            <th class="text-right">Paid</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>#PT001</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/patients/patient1.jpg" alt="User Image"></a>
                                                    <a href="profile.html">Charlene Reed </a>
                                                </h2>
                                            </td>
                                            <td>29</td>
                                            <td>4417 Goosetown Drive, Taylorsville, North Carolina, 28681</td>
                                            <td>8286329170</td>
                                            <td>20 Oct 2019</td>
                                            <td class="text-right">$100.00</td>
                                        </tr>
                                        <tr>
                                            <td>#PT002</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/patients/patient2.jpg" alt="User Image"></a>
                                                    <a href="profile.html">Travis Trimble </a>
                                                </h2>
                                            </td>
                                            <td>23</td>
                                            <td>4026 Fantages Way, Brunswick, Maine, 04011</td>
                                            <td>2077299974</td>
                                            <td>22 Oct 2019</td>
                                            <td class="text-right">$200.00</td>
                                        </tr>
                                        <tr>
                                            <td>#PT003</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/patients/patient3.jpg" alt="User Image"></a>
                                                    <a href="profile.html">Carl Kelly</a>
                                                </h2>
                                            </td>
                                            <td>29</td>
                                            <td>2037 Pearcy Avenue, Decatur, Indiana, 46733</td>
                                            <td>2607247769</td>
                                            <td>21 Oct 2019</td>
                                            <td class="text-right">$250.00</td>
                                        </tr>
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

@endsection