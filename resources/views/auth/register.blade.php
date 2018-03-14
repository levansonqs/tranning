
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="icon" href="/files/iconQuantri.png" type="image/gif">
        <title>Đăng nhập</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="/templates/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="/templates/admin/bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="/templates/admin/bower_components/Ionicons/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="/templates/admin/dist/css/AdminLTE.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="/templates/admin/plugins/iCheck/square/blue.css">

        <!-- jQuery 3 -->
        <script src="/templates/admin/bower_components/jquery/dist/jquery.min.js"></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="/templates/admin/index2.html"><b>Đăng Ký</b></a>
            </div>
            <!-- /.login-logo -->
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                    @endforeach
                @endif
            <div class="login-box-body">
                <!--    <p class="login-box-msg">Đăng nhập vào trang quản trị</p>   --> 
                <p class="login-box-msg" id="login-error" ></p>
                <form method="post" action="{{ route('auth.register') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="Nhập vào Username" name="username">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        <label for="" style="color:red">{{ $errors->first('username') }}</label>
                        <br>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="Nhập vào fullname" name="fullname">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        <label for="" style="color:red">{{ $errors->first('fullname') }}</label>
                        <br>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="Nhập vào Email" name="email">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        <label for="" style="color:red">{{ $errors->first('email') }}</label>
                        <br>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="Nhập vào Password" name="password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        <label for="" style="color:red">{{ $errors->first('password') }}</label>
                        <br>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="Nhập lại Password" name="rePassword">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        <label for="" style="color:red">{{ $errors->first('rePassword') }}</label>
                        <br>
                    </div>
                    
                    <div class="row">
                        <div class="col-xs-8">
                        </div>
                        <div class="col-xs-5 ">
                            <a href="/auth/login" title="" class="btn btn-primary btn-block btn-flat">Quay lại</a>
                        </div>
                        <!-- /.col -->
                        <div class="col-xs-5 col-xs-offset-2">
                            <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Đăng Ký</button>
                        </div>
                        <!-- /.col -->
                    </div>
                    
                </form>
            </div>
            <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->
        <!-- Bootstrap 3.3.7 -->
        <script src="/templates/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- iCheck -->
        <script src="/templates/admin/plugins/iCheck/icheck.min.js"></script>
        <script>
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%' /* optional */
                });
            });
        </script>
    </body>
</html>
