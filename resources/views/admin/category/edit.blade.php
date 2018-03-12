    <form role="form" method="post" action="" id=""  enctype='multipart/form-data'>
      {{csrf_field()}}              
      <div class="row">
        <div class="form-group col-md-12">
          <label for="">Tên</label>
          <input type="text" class="form-control" placeholder="Nhập tên"
          name="editname" required value="{{$objArticleCat->name}}" id="{{$objArticleCat->acat_id}}">              
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-12">
          <label for="">Danh mục cha</label>
          <select name="editCatParent" id="inputCatParent" class="form-control required" required>
            <option value="0">--Chọn danh mục cha--</option>
            @foreach ($listCat as $item)
            @php
              if($item->acat_id == $objArticleCat->parent_id) $selected = 'selected';
              else $selected = '';
            @endphp
            <option value="{{$item->acat_id}}" {{$selected}} >{{$item->name}}</option>
            @endforeach
          </select>
        </div>
      </div>            
    </form>