@extends('layouts/master')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Atma Auto | Update Sparepart</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
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
                                <h1>Sparepart</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Update Sparepart</li>
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
                                        <h3 class="card-title">Data Sparepart</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        @foreach ($data as $item)
                                            <form action="{{ url('updatesparepart') }}" method="POST">
                                                @csrf
                                                <div class="card-body">
                                                    <input type="hidden" class="form-control" name="sparepart_id"
                                                        value="{{ $item['sparepart_id'] }}" id="sparepart_id">
                                                    <img src="https://i.imgur.com/g8bz4WM.png" height="300" width="300" class="center"/>
                                                    <div class="form-group">
                                                        <label for="sparepart_code">Sparepart Code</label>
                                                        <input type="text" class="form-control" name="sparepart_code"
                                                            value="{{ $item['sparepart_code'] }}" id="sparepart_code"
                                                            placeholder="Enter Code">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="sparepart_place">Sparepart Place</label>
                                                        <input type="text" class="form-control" name="sparepart_place"
                                                            value="{{ $item['sparepart_place'] }}" id="sparepart_place"
                                                            placeholder="Enter Place">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="sparepart_merk">Sparepart Merk</label>
                                                        <input type="text" class="form-control" name="sparepart_merk"
                                                            value="{{ $item['sparepart_merk'] }}" id="sparepart_merk"
                                                            placeholder="Enter Merk">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="sparepart_type">Sparepart Type</label>
                                                        <input type="text" class="form-control" name="sparepart_type"
                                                            value="{{ $item['sparepart_type'] }}" id="sparepart_type"
                                                            placeholder="Enter Type">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="sparepart_price">Sparepart Price</label>
                                                        <input type="text" class="form-control" name="sparepart_price"
                                                            value="{{ $item['sparepart_price'] }}" id="sparepart_price"
                                                            placeholder="Enter Price">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="sparepart_stock">Sparepart Stock</label>
                                                        <input type="text" class="form-control" name="sparepart_stock"
                                                            value="{{ $item['sparepart_stock'] }}" id="sparepart_stock"
                                                            placeholder="Enter Stock">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="sparepart_id">Sparepart File</label>
                                                        <div class="default-file-upload">
                                                          <input id="sparepart_id" name="file" type="file"/>
                                                          </div>
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
        <script src="../../plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- DataTables  & Plugins -->
        <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
        <script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="../../plugins/jszip/jszip.min.js"></script>
        <script src="../../plugins/pdfmake/pdfmake.min.js"></script>
        <script src="../../plugins/pdfmake/vfs_fonts.js"></script>
        <script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
        <script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
        <script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
        <!-- AdminLTE App -->
        <script src="../../dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="../../dist/js/demo.js"></script>
        <!-- Page specific script -->

    </body>

    </html>
@endsection
