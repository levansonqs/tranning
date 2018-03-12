 @extends('templates.admin.master')
 @section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
 	<!-- Content Header (Page header) -->
 	<section class="content-header">
 		<h1>
 			QUẢN LÝ DỰ ÁN
 		</h1>
 		<ol class="breadcrumb">
 			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
 			<li class="active">Dự án </li>
 		</ol>
 	</section>
 	@if (Session::has('msg'))
 	<br>
 	<p class="alert alert-success ">{{ Session::get('msg') }}</p>
 	@endif

 	<!-- Main content -->
 	<section class="content">  
 		<div class="row">       
 			<div class="col-xs-12">
 				<div class="box">
 					<div class="box-header">
 						<h3 class="box-title text-success">DANH SÁCH DỰ ÁN</h3>
 					</div>
 					<!-- /.box-header -->
 					<a href="{{ route('admin.project.add') }}" class="btn btn-success btn-flat btn-them">
 						Thêm Dự án
 					</a>
 					<div class="box-body">
 						<table id="tb" class="table table-bordered table-striped">
 							<thead>
 								<tr>
 									<th>ID</th>
 									<th>Tên</th>
 									<th>Link</th>
 									<th>Hình ảnh</th>
 									<th>Mô tả</th>
 									<th>Thuộc loại</th>
 									<th>Chức năng</th>
 								</tr>
 							</thead>
 							<tbody>
 								@php
 								$stt = 1;
 								@endphp
 								@foreach ($objProject as $items)
 								@php
 								// dd($items);
 								$urlEdit = route('admin.project.edit',[$items->pid]);
 								$urlDel = route('admin.project.del',[$items->pid]);
 								$picName = $items->picture;
 								$urlHinh = '/storage/app/public/files/'.$picName ;
 								$projectCatname = DB::table('project_cats')->where('pcat_id','=',$items->pcat_id)->first()->name;
 								@endphp
 								<tr>
 									<td>{{ $stt++ }}</td>
 									<td>{{ $items->name }}</td>
 									<td>{{ $items->link }}</td>
 									<td>
 										@if (!empty($picName))
 										<img src="{{ $urlHinh}}" class="img-responsive" width="75px">
 										@else
 										<span class="text-danger"> Không có hình !</span>
 										@endif
 									</td> 							
 									<td width="25%">{{ $items->preview_text }}</td>
 									<td>{{ $projectCatname }}</td>
 									<td class="text-left">
 										<a href="{{ $urlEdit }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>  Sửa</a>
 										<a href="{{ $urlDel }}" class="btn btn-danger btn-sm btn-del delItem "><i class="fa fa-remove"></i>  Xóa</a>
 									</td>
 								</tr>
 								@endforeach
 							</tbody>
 						</table>
 					</div>
 				</div>
 			</div>
 		</div>

 	</section>
 </div>
 <!-- /.content-wrapper -->

 @stop()
