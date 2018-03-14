  
<!-- Modal content-->
<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Chi tiết sản phẩm</h4>
  </div>
  <div class="modal-body">
    <textarea name="detail" id="detail" class="form-control" required="required"> {{$objProduct->detail}}                     
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
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
</div>
</div>