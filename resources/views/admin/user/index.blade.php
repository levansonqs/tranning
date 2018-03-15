 @extends('templates.admin.master')
 @section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
 	<!-- Content Header (Page header) -->
 	<section class="content-header">
 		<h1>
 			QUẢN LÝ THÀNH VIÊN
 		</h1>
 		<ol class="breadcrumb">
 			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
 			<li class="active">THÀNH VIÊN </li>
 		</ol>
 	</section>
 	@if (Session::has('msg'))
 	<br>
 	<p class="alert alert-success">{{ Session::get('msg') }}</p>
 	@endif

 	<!-- Main content -->
 	<section class="content">  
 		<div class="row">       
 			<div class="col-xs-12">
 				<div class="box">
 					<div class="box-header">
 						<h3 class="box-title text-success">DANH SÁCH THÀNH VIÊN</h3>
 					</div>
 					<!-- /.box-header -->
 					<a href=" {{ route('admin.user.add') }} " class="btn btn-success btn-flat btn-them"><i class="fa fa-plus"></i>
 						Thêm thành viên
 					</a>
 					<div class="box-body">
 						<table id="tbProduct" class="table table-bordered table-striped">
 							<thead>
 								<tr>
 									<th>ID</th>
 									<th>Tên đăng nhập</th>
 									<th>Họ tên</th> 									
 									<th>Email</th> 									
 									<th>Avatar</th> 									
 									<th>Cấp độ</th> 									
 									<th>Chức năng</th>
 								</tr>
 							</thead>
 							<tbody>
 								@php
 									$stt = 1;
 								@endphp
 								@foreach ($objUser as $item)
 								@php
	 								$urlEdit = route('admin.user.edit',[$item->id]);
	 								$urlDel = route('admin.user.delete',[$item->id]);
 								@endphp
 								<tr>
 									<td>{{ $stt++ }}</td>
 									<td>{{ $item->username }}</td> 								
 									<td>{{ $item->fullname }}</td> 								
 									<td>{{ $item->email }}</td> 									
 									<td>
 										@php
 										$check = strpos($item->avatar,'http');
 										// $check = var_dump($check);
 										if($check == false ){
 											if(empty($item->avatar)){
 												$picName = "images/userDefault.png";		
 												$picUrl  = Storage::url($picName);
 											}else{
 												$picName = "images/".$item->avatar;		
 												$picUrl  = Storage::url($picName);
 											}
 										}else{
 											$picUrl = "$item->avatar";
 										}

 											// if(empty($item->avatar)){
 											// 	$picName = "images/userDefault.png";		
 											// 	$picUrl  = Storage::url($picName);
 											// }elseif( strpos($item->avatar,'http://') ){
 											// 	$picUrl = $item->avatar;
 											// 	// dd($picUrl);
 											// }
 											// else{
 											// 	$picName = "images/".$item->avatar;		
 											// 	$picUrl  = Storage::url($picName);
 											// }
 										@endphp
 										<img src="{{ $picUrl}}" class="img-responsive thumbnail">
 										{{-- {{ dump($check)}} --}}
 									</td> 
 									<td>
 										@php
 										switch ($item->level) {
 											case '1':
 											echo "Admin";
 											break;
 											case '2' :
 											echo  "Quản lý";
 											default:
 											echo "Khách hàng";
 											break;
 										}
 										@endphp
 									</td> 									
 									<td class="text-left">
 										<a href="{{ $urlEdit }}" class="btn btn-primary btn-sm btn-del editItem "><i class="fa fa-edit"></i>  Sửa</a>
 										<a href="{{ $urlDel }}" class="btn btn-danger btn-sm btn-del delItem "><i class="fa fa-trash"></i>  Xóa</a>
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
