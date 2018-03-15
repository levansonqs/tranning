@extends('templates.admin.master')
@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">User</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">       
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title text-success">DANH SÁCH THÀNH VIÊN</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
           <div class="row">
            <div class="col-md-12">
              <form role="form" method="post" action="{{ route('admin.user.add') }}" id=""  enctype='multipart/form-data'>
                {{csrf_field()}}              
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="">Tên đăng nhập</label>
                    <input type="text" class="form-control" placeholder="Nhập username"
                    name="username" required>              
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="">Họ tên</label>
                    <input type="text" class="form-control" placeholder="Nhập họ tên"
                    name="fullname" required>              
                  </div>
                </div> 
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="">Mật khẩu</label>
                    <input type="password" class="form-control" placeholder="Nhập mật khẩu"
                    name="password" required>              
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="">Email</label>
                    <input type="email" class="form-control" placeholder="Nhập email"
                    name="email" required>              
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="">Hình ảnh</label>
                    <input type="file" class="form-control" name="image" required>              
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="">Chọn cấp độ</label>
                    <select name="level" id="inputLevel" class="form-control" required="required">
                      <option value="1">Admin</option>
                      <option value="2">Quản lý</option>
                      <option value="3">Khách hàng</option>
                    </select>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-lg" >Thêm User</button>
                <a href=" {{ route('admin.user.index') }} " class="btn btn-success btn-lg mt-2" >Quay lại</a>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>  
</section>
<!-- /.content -->
</div>

@stop()
