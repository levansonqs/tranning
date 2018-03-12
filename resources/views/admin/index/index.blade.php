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
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3><span class="statistic-counter"> {{  100 }} </span></h3>
           
            <p>Tổng bài viết</p>
          </div>
          <div class="icon">
            <i class="ion ion-android-apps"></i>
          </div>
          <a href="" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3><span class="statistic-counter">{{  100 }}</span></h3>
            <p>Tổng danh mục </p>
          </div>
          <div class="icon">
            <i class="ion ion-ios-browsers-outline"></i>
          </div>
          <a href="" class="small-box-footer">Xem thêms <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3> <span class="statistic-counter">{{  100 }}</span></h3>

            <p>Tổng thành viên</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3><span class="statistic-counter">{{  100 }}</span></h3>

            <p>Tổng bình luận</p>
          </div>
          <div class="icon">
            <i class="ion ion-ios-chatbubble"></i>
          </div>
          <a href="/admin/binhluan" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->

    <!-- Main row -->
    <div class="row">
      <!-- Left col -->
      <section class="col-lg-7 connectedSortable">
        <!-- Custom tabs (Charts with tabs)-->
        <div class="nav-tabs-custom">
        </div>
        <!-- /Custom tabs (Charts with tabs)-->
      </section>
      <!-- /.Left col -->
    </div>
    <!-- /.row (main row) -->
  </section>
  <!-- /.content -->
</div>


@stop()

