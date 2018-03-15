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
      <li class="active">Sản phẩm</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">       
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title text-success">DANH SÁCH SẢN PHẨM</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
           <div class="row">
            <div class="col-md-12">
              <form role="form" method="post" action="{{ route('admin.product.add') }}" id=""  enctype='multipart/form-data'>
                {{csrf_field()}}              
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="">Tên</label>
                    <input type="text" class="form-control" placeholder="Nhập tên"
                    name="name" required>              
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="">Danh mục cha</label>
                    <select name="cate_id" id="input" class="form-control" required="required">
                      <option value="0">--Chọn danh mục cha --</option>}
                      @php
                      cat_parent($objCats);
                      @endphp
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="">Giá</label>
                    <input type="number" class="form-control" placeholder="Nhập giá"
                    name="price" required>              
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
                    <label for="">Giảm giá</label>
                    <input type="text" class="form-control" placeholder="Nhập giảm giá"
                    name="discount" required>              
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="">Tổng số lượng</label>
                    <input type="text" class="form-control" placeholder="Nhập tổng số lượng"
                    name="total" required>              
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="">Mô tả</label>
                    <textarea name="description" id="inputDes" class="form-control" rows="3" required="required">                      
                    </textarea>           
                  </div>
                </div>     
                <div class="row">
                  <div class="form-group col-md-12">
                    <label for="">Chi tiết</label>
                    <textarea name="detail" id="detail" class="form-control" rows="3" required>                      
                    </textarea>       

                  </div>
                </div>  
                <script>
                 CKEDITOR.replace( 'detail',
                 {
                  filebrowserBrowseUrl : '/templates/admin/js/ckfinder/ckfinder.html',
                  filebrowserImageBrowseUrl : '/templates/admin/js/ckfinder/ckfinder.html?type=Images',
                  filebrowserFlashBrowseUrl : '/templates/admin/js/ckfinder/ckfinder.html?type=Flash',
                  filebrowserUploadUrl : '/templates/admin/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                  filebrowserImageUploadUrl : '/templates/admin/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                  filebrowserFlashUploadUrl : '/templates/admin/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
                });
              </script>   
                <button type="submit" class="btn btn-primary btn-lg" >Thêm sản phẩm</button>
                <a href=" {{ route('admin.product.index') }} " class="btn btn-success btn-lg mt-2" >Quay lại</a>
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
