@extends('templates.admin.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      QUẢN LÝ DỰ ÁN
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">DỰ ÁN</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">  
    <div class="row">       
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Sửa </h3>
          </div>   
          <form role="form" method="post" action="{{ route('admin.project.edit',$objProject->pid) }}" id="frmThemBaiviet"  enctype='multipart/form-data'>
           {{csrf_field()}}
           <div class="box-body">          
             @if ($errors->any())
             <div class="alert alert-danger col-md-12">
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif
            <div class="row">
              <div class="form-group col-md-6">
                <label for="">Tên</label>
                <input type="text" class="form-control" id="" placeholder="Nhập tên"
                name="name" value="{{$objProject->name}}">              
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label for="">Link</label>
                <input type="url" class="form-control" id="" placeholder=""
                name="link" value="{{$objProject->link}}">              
              </div>
            </div>
            @php
            $urlPic = "/storage/app/public/files/".$objProject->picture;
            @endphp
            <div class="form-group" id="hinhcu">
              <label for="">Hình hiện tại</label>
              <img src="{{ $urlPic}}" alt="" class="img-responsive">
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label for="">Hình ảnh</label>
                <input type="file" id="" name="picture">
                {{-- <p class="help-block">Chọn ảnh cho slider </p> --}}
              </div>
            </div>
            <label for="">Mô tả</label>
            <div class="form-group">
              <textarea class="mota" rows="4"  cols="80" name="preview_text">{{$objProject->preview_text}}</textarea>                
            </div>
            <div class="form-group col-md-5">
              <label>Loại dự án</label>
             <select class="form-control" name="pcat_id">
              <option value="0">--Chọn loại dự án--</option>
              @foreach ($objProjectCat as $itemCat)
              @php
                if($itemCat->pcat_id == $objProject->pcat_id) $selected = 'selected';
                else $selected ='2';
              @endphp
              <option {{$selected}} value="{{$itemCat->pcat_id}}">{{$itemCat->name }}</option>
              @endforeach  
            </select>
          </div> 
        </div>
        <div class="box-footer col-md-3">
          <button type="submit" class="btn btn-primary btn-block" name="them">Sửa</button>
        </div>
      </form>
    </div>
  </div>
</div>
</section>

</div>
<!-- /.content-wrapper -->
@stop()