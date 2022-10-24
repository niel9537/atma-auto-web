<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Atma Auto | Sign up</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('AdminLTE') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('AdminLTE') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('AdminLTE') }}/dist/css/adminlte.min.css">
    <style>
        .center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}
    </style>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->

        <div class="card card-outline card-primary">
            <img src="https://i.ibb.co/tLfTgV6/tma-Auto-removebg-preview.png" class="center"/>
            {{-- <div class="card-header text-center">
                <a class="h1"><b>Atma </b>Auto</a>
            </div> --}}
            <div class="card-body">
                {{-- <p class="login-box-msg">Sign In</p> --}}
                <form action="{{ url('signup') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-3">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                        <input type="email" class="form-control" name="user_email" placeholder="Email">
                        <div class="input-group-append">

                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                        <input type="password" class="form-control" name="user_password" placeholder="Password">
                        <div class="input-group-append">

                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-text">
                            <span class="fas fa fa-id-badge"></span>
                        </div>
                        <input type="text" class="form-control" name="user_fullname" placeholder="Fullname">
                        <div class="input-group-append">

                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-text">
                            <span class="fas fa fa-user"></span>
                        </div>
                        <input type="text" class="form-control" name="user_name" placeholder="Username">
                        <div class="input-group-append">

                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-text">
                            <span class="fas fa fa-address-book"></span>
                        </div>
                        <input type="text" class="form-control" name="user_address" placeholder="Address">
                        <div class="input-group-append">

                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-text">
                            <span class="fas fa fa-users"></span>
                        </div>
                        <select name="user_role" class="form-control">
                            <option selected disabled>Pilih Role</option>
                            <option value="1">Customer Service</option>
                            <option value="2">Kasir</option>
                        </select>
                        {{-- <input type="text" class="form-control" name="user_role" placeholder="Role"> --}}
                        <div class="input-group-append">

                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-text">
                            <span class="fas fa fa-phone"></span>
                        </div>
                        <input type="number" class="form-control" name="user_phonenumber" placeholder="Phonenumber">
                        <div class="input-group-append">

                        </div>
                    </div>
                    {{-- <div class="row"> --}}
                    {{-- <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div> --}}
                    <!-- /.col -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
                    </div>
                    <!-- /.col -->
                    {{-- </div> --}}
                </form>

                {{-- <div class="social-auth-links text-center mt-2 mb-3">
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                    </a>
                </div> --}}
                <!-- /.social-auth-links -->


                <p class="mt-4 mb-0 text-center">
                    <a href="{{ url('/') }}" class="text-center">Already have account? click here</a>
                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ asset('AdminLTE') }}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('AdminLTE') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('AdminLTE') }}/dist/js/adminlte.min.js"></script>
</body>

</html>
