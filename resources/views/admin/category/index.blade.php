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
 					<a href=" {{ route('admin.category.add') }} " class="btn btn-success btn-flat btn-them"><i class="fa fa-plus"></i>
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
 								@foreach ($objParent as $item)
 								@php
 									$urlEdit = route('admin.category.edit',[$item->id]);
 									$urlDel = route('admin.category.del',[$item->id]);
 								@endphp
 								<tr>
 									<td>{{ $stt++ }}</td>
 									<td>{{ $item->name }}</td> 								
 									<td>{{ $item->description }}</td> 									
 									<td class="text-left">
 										<a href="{{ $urlEdit }}" class="btn btn-primary btn-sm btn-del editItem "><i class="fa fa-edit"></i>  Sửa</a>
 										<a href="{{ $urlDel }}" class="btn btn-danger btn-sm btn-del delItem "><i class="fa fa-trash"></i>  Xóa</a>
 									</td>
 								</tr>
 								@php
 									$objCat = DB::table('categories')->where('parent_id','=',$item->id)->get();
 								@endphp
 								@foreach ($objCat as $itemCat)
 								@php
 									$urlEdit = route('admin.category.edit',[$itemCat->id]);
 									$urlDel = route('admin.category.del',[$itemCat->id]);
 								@endphp
 								<tr>
 									<td>{{ $stt++ }}</td>
 									<td><span class="text-danger txt-red">&nbsp;|--</span>{{ $itemCat->name }}</td> 						
 									<td>{{ $itemCat->description }}</td> 									
 									<td class="text-left">
 										<a href="{{ $urlEdit }}" class="btn btn-primary btn-sm btn-del editItem "><i class="fa fa-edit"></i>  Sửa</a>
 										<a href="{{ $urlDel }}" class="btn btn-danger btn-sm btn-del delItem "><i class="fa fa-trash"></i>  Xóa</a>
 									</td>
 								</tr>
 								@endforeach
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
