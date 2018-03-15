 @extends('templates.admin.master')
 @section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
 	<!-- Content Header (Page header) -->
 	<section class="content-header">
 		<h1>
 			QUẢN LÝ CHI TIẾT ĐƠN HÀNG
 		</h1>
 		<ol class="breadcrumb">
 			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
 			<li class="active">CHI TIẾT ĐƠN HÀNG </li>
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
 						<h3 class="box-title text-success">DANH SÁCH ĐƠN  ĐẶT HÀNG</h3>
 					</div>
 					<!-- /.box-header -->
 					<a href=" {{ route('admin.product.add') }} " class="btn btn-success btn-flat btn-them"><i class="fa fa-plus"></i>
 						ThêM
 					</a>
 					<div class="box-body">
 						<table id="tbProduct" class="table table-bordered table-striped">
 							<thead>
 								<tr>
 									<th>STT</th>
 									<th>ID đơn hàng</th>
 									<th>Tên</th> 									
 									<th>Giá </th> 									
 									<th>Hình ảnh</th> 	
 									<th>Chức năng</th>
 								</tr>
 							</thead>
 							<tbody>
 								@php
 								$stt = 1;
 								@endphp
 								@foreach ($objOrderDetail as $item)
 								@php
 								// dd($item);
 								$urlEdit = route('admin.product.edit',[$item->id]);
 								$urlDel = route('admin.product.delete',[$item->id]);
 								$img = "images/".$item->images;
 								$urlPic = Storage::url($img);
 							
 								@endphp
 								<tr>
 									<td>{{ $stt++ }}</td>
 									<td>{{ $item->id_order }}</td> 								
 									<td>{{ $item->name }}</td> 								
 									<td>{{ $item->price }}</td> 								
 									<td><img src="{{ $urlPic}}" class="img-responsive thumbnail"></td> 	
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
 		<!-- Modal -->
 		<div id="detailModal" class="modal fade" role="dialog">
 			<div class="modal-dialog modal-lg"" id="orderDetail">

 			</div>
 		</div>

 	</section>
 </div>
 <!-- /.content-wrapper -->

 @stop()
