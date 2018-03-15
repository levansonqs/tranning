 @extends('templates.admin.master')
 @section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
 	<!-- Content Header (Page header) -->
 	<section class="content-header">
 		<h1>
 			QUẢN LÝ ĐƠN HÀNG
 		</h1>
 		<ol class="breadcrumb">
 			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
 			<li class="active">ĐƠN HÀNG </li>
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
 						<h3 class="box-title text-success">DANH SÁCH ĐƠN HÀNG</h3>
 					</div>
 					<!-- /.box-header -->
 					<a href=" {{ route('admin.order.add') }} " class="btn btn-success btn-flat btn-them"><i class="fa fa-plus"></i>
 						Thêm đơn hàng
 					</a>
 					<div class="box-body">
 						<table id="tborder" class="table table-bordered table-striped">
 							<thead>
 								<tr>
 									<th>ID</th>
 									<th>Tên khách hàng</th> 									
 									<th>Địa chỉ</th> 		
 									<th>Ngày đặt hàng </th> 	
 									<th>Tổng tiền</th>
 									<th>Chức năng</th>
 								</tr>
 							</thead>
 							<tbody>
 								@php
 								$stt = 1;
 								@endphp
 								@foreach ($objOrder as $item)
 								@php
 								dump($item);
 								$urlEdit = route('admin.order.edit',[$item->id]);
 								$urlDel = route('admin.order.delete',[$item->id]); 		
 								$date = date_create($item->order_date);
 								$date = date_format($date,"d/m/Y");								
 								@endphp
 								<tr>
 									<td>{{ $stt++ }}</td>
 									<td>{{ $item->fullname }}</td> 								
 									<td>{{ $item->address }}</td> 
 									<td>{{$date}}</td>
 									<td>{{ number_format($item->total,"0",".",",") }} <i class="fas fa-dollar-sign"></i></td> 		
 									<td class="text-left"">
 										<form action="" method="post" style="display: inline-block;">
 											{{csrf_field()}}
 											<a  href="javascript:void(0)" class="btn btn-success pDetail"  data-toggle="modal" data-target="#detailModal" orderid = "{{$item->id}}">Chi tiết</a>	
 										</form>	
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
