@extends('layouts/master')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Atma Auto | Update Customer</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/fontawesome-free/css/all.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('AdminLTE')}}/dist/css/adminlte.min.css">
    </head>

    <body class="hold-transition sidebar-mini">
        <div class="wrapper">


            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Customer</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Update Customer</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Data Customer</h3>
                                    </div>

                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        @foreach ($data as $item)
                                        <form action="{{ url('updatecustomer') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="card-body">
                                                <input type="hidden" name="user_id"  value="{{ $item['user_id'] }}"/>
                                                <div class="input-group mb-3">

                                                    <input type="email" class="form-control" name="user_email" value="{{ $item['user_email'] }}" placeholder="Email">

                                                </div>
                                                <div class="input-group mb-3">

                                                    <input type="password" class="form-control" name="user_password" value="{{ $item['user_password'] }}" placeholder="Password">

                                                </div>
                                                <div class="input-group mb-3">

                                                    <input type="text" class="form-control" name="user_fullname" value="{{ $item['user_fullname'] }}" placeholder="Fullname">

                                                </div>
                                                <div class="input-group mb-3">

                                                    <input type="text" class="form-control" name="user_name" value="{{ $item['user_name'] }}" placeholder="Username">

                                                </div>
                                                <div class="input-group mb-3">

                                                    <input type="text" class="form-control" name="user_address" value="{{ $item['user_address'] }}" placeholder="Address">

                                                </div>
                                                {{-- <div class="input-group mb-3">

                                                    <select name="user_role" class="form-control">
                                                        <option selected disabled>Pilih Role</option>
                                                        <option value="2">Customer Service</option>
                                                        <option value="3">Kasir</option>
                                                    </select>
                                                    {{-- <input type="text" class="form-control" name="user_role" placeholder="Role"> --}}

                                                {{-- </div> --}}
                                                <div class="input-group mb-3">

                                                    <input type="number" class="form-control" name="user_phonenumber" value="{{ $item['user_phonenumber'] }}" placeholder="Phonenumber">

                                                </div>

                                                {{-- <div class="form-group">
                                                    <label for="exampleInputPassword1">Password</label>
                                                    <input type="password" class="form-control" id="exampleInputPassword1"
                                                        placeholder="Password">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputFile">File input</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input"
                                                                id="exampleInputFile">
                                                            <label class="custom-file-label" for="exampleInputFile">Choose
                                                                file</label>
                                                        </div>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">Upload</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                                </div> --}}
                                            </div>
                                            <!-- /.card-body -->

                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                        @endforeach
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->

        <!-- jQuery -->
        <script src="{{asset('AdminLTE')}}/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="{{asset('AdminLTE')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- DataTables  & Plugins -->
        <script src="{{asset('AdminLTE')}}/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="{{asset('AdminLTE')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="{{asset('AdminLTE')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="{{asset('AdminLTE')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script src="{{asset('AdminLTE')}}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
        <script src="{{asset('AdminLTE')}}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="{{asset('AdminLTE')}}/plugins/jszip/jszip.min.js"></script>
        <script src="{{asset('AdminLTE')}}/plugins/pdfmake/pdfmake.min.js"></script>
        <script src="{{asset('AdminLTE')}}/plugins/pdfmake/vfs_fonts.js"></script>
        <script src="{{asset('AdminLTE')}}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
        <script src="{{asset('AdminLTE')}}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
        <script src="{{asset('AdminLTE')}}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
        <!-- AdminLTE App -->
        <script src="{{asset('AdminLTE')}}/dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{asset('AdminLTE')}}/dist/js/demo.js"></script>
        <!-- Page specific script -->

    </body>

    </html>
@endsection
