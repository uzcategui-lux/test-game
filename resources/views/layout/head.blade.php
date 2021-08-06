    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

	{{-- Title App --}}
    <title>Test Gamex</title>

    @yield('local_head')
    <!-- Custom Fonts -->
    <link href="{{ asset('assets/css/all.css') }}" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Wraper -->
    <link href="{{ asset('assets/css/wraper.css') }}" rel="stylesheet">

   <!-- DataTables Core CSS-->
    <link href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

   <!-- DataTables Core CSS-->
    <link href="{{ asset('assets/css/app-style.css') }}" rel="stylesheet">
