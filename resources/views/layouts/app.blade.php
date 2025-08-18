<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:20 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Doccure - Dashboard</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

        <!-- Datatables CSS -->
		<link rel="stylesheet" href="{{ asset('assets/plugins/datatables/datatables.min.css') }}">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
		
		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/feathericon.min.css') }}">
		
		<link rel="stylesheet" href="{{ asset('assets/plugins/morris/morris.css') }}">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
		
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body>
	
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
            @include('layouts.components.header')
			<!-- /Header -->
			
			<!-- Sidebar -->
            @include('layouts.components.sidebar')
			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            @section('content')
            @show

			<!-- /Page Wrapper -->
		
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="{{ asset('assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
		
		<!-- Slimscroll JS -->
        <script src="{{ asset('assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

        <!-- Datatables JS -->
		<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/datatables/datatables.min.js') }}"></script>
		
		<script src="{{ asset('assets/plugins/raphael/raphael.min.js') }}"></script>    
		<script src="{{ asset('assets/plugins/morris/morris.min.js') }}"></script>  
		<script src="{{ asset('assets/js/chart.morris.js') }}"></script>
		
		<!-- Custom JS -->
		<script  src="{{ asset('assets/js/script.js') }}"></script>

        <script>
         $(document).ready(function() {
               $('.deleteBtn').click(function() {
                var delId = $(this).data('id');
                var url = "{{ url(('')) }}/" + delId;
                $('#deleteForm').attr('action', url);  
            });
        });
        </script>
		
    </body>
</html>