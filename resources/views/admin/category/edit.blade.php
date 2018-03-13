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
      <li class="active">Danh mục</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">       
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title text-success">SỬA DANH MỤC</h3>
          </div>
          <!-- /.box-header -->
         {{--  @php
            dd($objCat);
          @endphp --}}
          <div class="box-body">
           <div class="row">
            <div class="col-md-5">
              <form role="form" method="post" action="{{ route('admin.category.edit',$objCat->id) }}" enctype='multipart/form-data'>
                {{csrf_field()}}              
                <div class="row">
                  <div class="form-group col-md-12">
                    <label for="">Tên</label>
                    <input type="text" class="form-control" placeholder="Nhập tên"
                    name="name" required value=" {{$objCat->name}} ">              
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-12">                  
                    <label for="">Danh mục cha</label>
                    <select name="parent_id" id="parent_id" class="form-control required" required>                      
                      <option value="0">--Chọn danh mục cha--</option>
                      @foreach ($objParent as $item)
                      @php
                          if($objCat->parent_id == $item->id) $selected = "selected";else $selected = '';
                      @endphp
                        <option value="{{$item->id}}" {{$selected}} >{{$item->name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>  
                <div class="row">
                  <div class="form-group col-md-12">
                    <label for="">Mô tả</label>
                    <textarea name="description" id="inputDes" class="form-control" rows="3" required="required">{{
                      $objCat->description
                    }}                     
                    </textarea>           
                  </div>
                </div>          
                <button type="submit" class="btn btn-primary btn-lg" >Sửa</button>
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
