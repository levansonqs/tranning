<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  @php
    if(isset($title)) $title = $title; else $title = 'Admin';
  @endphp
  <title>{{$title}}</title>  
  <link rel="shortcut icon" type="image/x-icon" href="{{getenv('ABOUTME_TEMPLATE_URL')}}/img/cv-icon.png" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{getenv('ADMIN_TEMPLATE_URL')}}/bower_components/bootstrap/dist/css/bootstrap.min.css">
  
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{getenv('ADMIN_TEMPLATE_URL')}}/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{getenv('ADMIN_TEMPLATE_URL')}}/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
   folder instead of downloading all of them to reduce the load. -->
   <link rel="stylesheet" href="{{getenv('ADMIN_TEMPLATE_URL')}}/dist/css/skins/_all-skins.min.css">
   <!-- Morris chart -->
   <link rel="stylesheet" href="{{getenv('ADMIN_TEMPLATE_URL')}}/bower_components/morris.js/morris.css">
   <!-- Date Picker -->
   <link rel="stylesheet" href="{{getenv('ADMIN_TEMPLATE_URL')}}/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
   <!-- Daterange picker -->
   <link rel="stylesheet" href="{{getenv('ADMIN_TEMPLATE_URL')}}/bower_components/bootstrap-daterangepicker/daterangepicker.css">
   <!-- DataTables -->
   <link rel="stylesheet" href="{{getenv('ADMIN_TEMPLATE_URL')}}/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

   <!-- iCheck -->
   <link rel="stylesheet" href="{{getenv('ADMIN_TEMPLATE_URL')}}/plugins/iCheck/square/blue.css">
   <link rel="stylesheet" href="{{getenv('ADMIN_TEMPLATE_URL')}}/css/admin_mycss.css">
   <!-- jQuery 3 -->
   <script src="{{getenv('ADMIN_TEMPLATE_URL')}}/bower_components/jquery/dist/jquery.min.js"></script>

   <script type="text/javascript" src="{{getenv('ADMIN_TEMPLATE_URL')}}/js/ckeditor/ckeditor.js"></script>
   <script type="text/javascript" src="{{getenv('ADMIN_TEMPLATE_URL')}}/js/ckfinder/ckfinder.js"></script>

   <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
{{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> --}}
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>LT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Trang quản trị </b></span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- User Account: style can be found in dropdown.less -->
     
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="" class="user-image">
                <span class="hidden-xs"></span>
              </a>
          
              <ul class="dropdown-menu">
                <!-- User image -->
                @if (Auth::check())
                  @php
                      $user = Auth::user();
                      $fullname = $user->fullname;
                      $avatar = $user->avatar;
                  @endphp
                  <p class="centered"><img src="/storage/app/files/{{ $avatar }}" class="img-circle" height="55" width="60"></p>
                  <h5 class="centered">{{ $fullname }}</h5>
                @endif
                <li class="user-header">
                   <img src="" class="img-circle" alt="User Image">
                  <p> 
                     {{ $fullname }}     
                  </p>
                </li>    
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="" class="btn btn-default btn-flat">Hồ sơ</a>
                </div>
                <div class="pull-right">
                  <a href="{{ route('auth.logout') }}" class="btn btn-default btn-flat">Đăng xuất</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>







