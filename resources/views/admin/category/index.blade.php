 @extends('templates.admin.master')
 @section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
 	<!-- Content Header (Page header) -->
 	<section class="content-header">
 		<h1>
 			QUẢN LÝ DANH MỤC
 		</h1>
 		<ol class="breadcrumb">
 			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
 			<li class="active">Danh mục </li>
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
 						<h3 class="box-title text-success">DANH SÁCH DANH MỤC</h3>
 					</div>
 					<!-- /.box-header -->
 					<a href="javascript:void(0)" class="btn btn-success btn-flat btn-them"
 					data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"></i>
 					Thêm danh mục
 				</a>
 				<div class="box-body">
 					<table id="tb" class="table table-bordered table-striped">
 						<thead>
 							<tr>
 								<th>ID</th>
 								<th>Tên danh mục</th> 									
 								<th>Mô tả</th> 									
 								<th>Chức năng</th>
 							</tr>
 						</thead>
 						<tbody>
 							@php
 							$stt = 1;
 							@endphp
 							@foreach ($objCategory as $items)
 							@php
 							$urlDel = route('admin.category.del',[$items->id]);
 							@endphp
 							<tr>
 								<td>{{ $stt++ }}</td>
 								<td>{{ $items->name }}</td> 								
 								<td>{{ $items->description }}</td> 									
 								<td class="text-left">
 									<a href="javascript:void()" class="btn btn-primary btn-sm editCat"
 									data-toggle="modal" data-target="#editModal" id="{{$items->id}}"><i class="fa fa-edit"></i>  Sửa</a>
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



 	<!-- Modal add-->	
 	<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
 		<div class="modal-dialog " role="document">
 			<div class="modal-content">
 				<div class="modal-header">
 					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
 					<h4 class="modal-title">Thêm danh mục</h4>
 				</div>
 				<div class="modal-body">
 					<form role="form" method="post" action="" id="frm"  enctype='multipart/form-data'>
 						{{csrf_field()}} 		 					
 						<div class="row">
 							<div class="form-group col-md-12">
 								<label for="">Tên danh mục</label>
 								<input type="text" class="form-control" placeholder="Nhập tên danh mục"
 								name="name" required>              
 							</div>
 						</div>
 						<div class="row">
 							<div class="form-group col-md-12">
 								<label for="">Mô tả</label>
 								<textarea name="description" id="description" class="form-control" rows="3" required="required"></textarea>
 							</div>
 						</div>

 					</form>
 				</div>
 				<div class="modal-footer">
 					{{-- <button type="button" class="btn btn-primary" >Thêm</button> --}}
 					<a href="javascript:void()" id="addCat"  class="btn btn-primary">Thêm</a>
 					<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
 				</div>
 			</div>
 		</div>
 	</div>
 	<!-- End Modal add-->


 	<!-- Modal edit-->	
 	<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
 		<div class="modal-dialog " role="document">
 			<div class="modal-content">
 				<div class="modal-header">
 					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
 					<h4 class="modal-title" id="myModalLabel">Sửa danh mục</h4>
 				</div>
 				<div class="modal-body" id="main-content">
 					


 				</div>
 				<div class="modal-footer">
 					{{-- <button type="button" class="btn btn-primary" >Thêm</button> --}}
 					<a href="javascript:void()" id="editArticleCatSave"  class="btn btn-primary">Sửa</a>
 					<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
 				</div>
 			</div>
 		</div>
 	</div>
 	<!-- End Modal edit-->


 </section>
</div>
<!-- /.content-wrapper -->

@stop()
