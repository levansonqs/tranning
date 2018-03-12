
$(document).ready(function() {
  $('#addProjectCat').click(function(){ 
    var _token = $("input[name='_token']").val();
    var url = window.location.origin+'/admin/projectcat/add';  
    var name = $("input[name='name']").val();  
    $.ajax({
      url:url,
      type:'GET',
      cache:false,
      data:{  
        '_token':_token,'name':name
      },      
      success:function(data){       
        if(data == "ok"){
          $('#myModal').modal('hide');
          swal(
            'Thêm thành công!',         
            '',
            'success'
            ).then((result) => {
              if (result.value) {
                window.location.reload()  ;
              }
            })
          }else{
           alert("Có lỗi");
         }
       },
       error:function(data){
        alert("Có lỗi khi xử lý")
      }
    })
  })  
  $('.editProjectCat').click(function(){ 
    var  id = $(this).attr('id');
    var _token = $("input[name='_token']").val();
    var url = window.location.origin+'/admin/projectcat/edit/'+id;  
    $.ajax({
      url:url,
      type:'GET',
      cache:false,
      dataType: "json",
      data:{  
        'id':id,'_token':_token,
      },      
      success:function(data){       
       $("input[name='editname']").val(data);
       $("input[name='editname']").attr('id',id);
     },
     error:function(data){
      alert("Có lỗi khi xử lý")
    }
  })
  })
  $('.editProjectCatSave').click(function(){ 
    var _token = $("input[name='_token']").val();
    var  id =  $("input[name='editname']").attr('id');    
    var url = window.location.origin+'/admin/projectcat/edit/'+id;  
    var name = $("input[name='editname']").val();
    // alert(name); return;
    $.ajax({
      url:url,
      type:'POST',
      cache:false,    
      data:{  
        '_token':_token,'editname':name
      },      
      success:function(data){       
        if(data == "ok"){
          $('#editModal').modal('hide');
          swal(
            'Sửa thành công!',         
            '',
            'success'
            ).then((result) => {
              if (result.value) {
                window.location.reload()  ;
              }
            })
          }else{
           alert("Có lỗi");
         }
       },
       error:function(data){
        alert("Có lỗi khi xử lý")
      }
    })
  })

// *****************************************
// *****************************************
// // *****************************************
  $('#addArticleCat').click(function(){ 
    var _token = $("input[name='_token']").val();
    var url = window.location.origin+'/admin/articlecat/add';  
    var name = $("input[name='name']").val(); 
    var parent_id = $("select[name='catParent']").val();
    // alert(parent_id) 
    // return;
    $.ajax({
      url:url,
      type:'POST',
      cache:false,
      data:{  
        '_token':_token,'name':name,'parent_id':parent_id
      },      
      success:function(data){       
        if(data == "ok"){
          $('#myModal').modal('hide');
          swal(
            'Thêm thành công!',         
            '',
            'success'
            ).then((result) => {
              if (result.value) {
                window.location.reload()  ;
              }
            })
          }else{
           alert("Có lỗi");
         }
       },
       error:function(data){
        alert("Có lỗi khi xử lý")
      }
    })
  })

  $('.editArticleCat').click(function(){     
    var  id = $(this).attr('id');
    var _token = $("input[name='_token']").val();
    var url = window.location.origin+'/admin/articlecat/edit/'+id;  

    $.ajax({
      url:url,
      type:'GET',
      cache:false,    
      data:{  
        '_token':_token,
      },      
      success:function(data){       
        $('#main-content').html(data);
      },
      error:function(data){
        alert("Có lỗi khi xử lý")
      }
    })
  })

  $('#editArticleCatSave').click(function(){ 
    var _token = $("input[name='_token']").val();
    var  id =  $("input[name='editname']").attr('id');    
    var url = window.location.origin+'/admin/articlecat/edit/'+id;  
    var name = $("input[name='editname']").val();
    var parent_id = $("select[name='editCatParent']").val();
    // alert(_id); return;
    $.ajax({
      url:url,
      type:'POST',
      cache:false,    
      data:{  
        '_token':_token,'editname':name,'parent_id':parent_id
      },      
      success:function(data){       
        if(data == "ok"){
          $('#editModal').modal('hide');
          swal(
            'Sửa thành công!',         
            '',
            'success'
            ).then((result) => {
              if (result.value) {
                window.location.reload()  ;
              }
            })
          }else{
           alert("Có lỗi");
         }
       },
       error:function(data){
        alert("Có lỗi khi xử lý")
      }
    })
  })





$('#hinhcu a').click(function(){
  var id = $(this).attr('idHinh'); 
  var _token = $("input[name='_token']").val();
  var url = window.location.origin+'/admin/news/delImg/'+id;   
  $.ajax({
    url:url,
    type:'GET',
    cache:false,
    data:{  
      'id':id,'_token':_token
    },      
    success:function(data){       
      if(data == "ok"){
        $("#hinhcu").remove();
      }else{
       alert("Có lỗi");
     }
   },
   error:function(data){
    alert("Có lỗi khi xử lý")
  }
})
})


$('#change-info').click(function(){
  var id = $(this).attr('nid'); 
  var _token = $("input[name='_token']").val(); 
  var url = window.location.origin+'/admin/user/cinfo/'+id;  
  var fullname = $("#fullname").val(); 

  $.ajax({
    url:url,
    type:'GET',
    cache:false,
    data:{  
      'id':id,'_token':_token,'fullname':fullname
    },      
    success:function(data){       
      if(data == "ok"){
        swal(
          'Đổi thông tin thành công!',         
          '',
          'success'
          )    
      }else{
       alert("Có lỗi");
     }
   },
   error:function(data){
    alert("Có lỗi khi xử lý")
  }
})
})


$('#sendEmail').click(function(){
  var _token = $("input[name='_token']").val(); 
  var url = window.location.origin+'/admin/user/sendmsg';  
  var mesContent = $("#mesContent").val(); 
  var fromUser = $(this).attr('idMes'); 
  var toUser = $("#toUser").val(); 
  // alert(toUser);
  // return;
  $.ajax({
    url:url,
    type:'GET',
    cache:false,
    data:{  
      'fromUser':fromUser,'toUser':toUser,'_token':_token,'mesContent':mesContent
    },      
    success:function(data){       
      if(data == "ok"){
        swal(
          'Gửi tin thành công!',         
          '',
          'success'
          ) ;
        $("#mesContent").val('');  
      }else{
       alert("Có lỗi");
     }
   },
   error:function(data){
    alert("Có lỗi khi xử lý")
  }
})
})
$('.respond').click(function(){
  var id = $(this).attr('id');
  // alert(id);return;
  var respondBlock = $("#block"+id); 
  var username = $(this).parent().parent().find("input[name='hidden']").val();
  var picUrl = window.location.origin+'/storage/app/public/files/userDefault.png';
  var resContent = $("#respond"+id).val(); 

  var _token = $(this).parent().parent().find("input[name='_token']").val();
  var url = window.location.origin+'/admin/user/respond';
  var fromUser =  $(this).parent().parent().find("input[name='fromUser']").val();
  var toUser =  $(this).parent().parent().find("input[name='toUser']").val();

  
  // return;
  $.ajax({
    url:url,
    type:'GET',
    cache:false,
    data:{  
      'fromUser':fromUser,'toUser':toUser,'_token':_token,'resContent':resContent,'id':id
    },      
    success:function(data){       
      if(data == "ok"){
        swal(
          'Tin nhắn đã gửi đi!',         
          '',
          'success'
          ) ;
        $("#respond"+id).val('');
        $("#block"+id).append("<div class='user-block'><img class='img-circle img-bordered-sm' src='"+picUrl+"' alt='User Image'><span class='username'><a href='#'>"+username+"</a><a href='#' class='pull-right btn-box-tool'><i class='fa fa-times'></i></a></span><span class='description text-danger'>Đã gửi cho bạn một tin nhắn</span></div><p style='color:#a94442'>"+resContent+"</p>");
      }else{
       alert("Có lỗi");
     }
   },
   error:function(data){
    alert("Có lỗi khi xử lý")
  }
})
})



jQuery('.statistic-counter').counterUp({
  delay: 10,
  time: 400
});

$('.alert').delay(3000).slideUp(600);


$('a.delItem').click(function(e){
 e.preventDefault();
 var url = $(this).attr('href');
 swal({
  title: 'Bạn có chắc muốn xóa ?',
  text: "Dữ liệu sẽ bị mất vĩnh viễn !",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Đồng ý',
  cancelButtonText: 'Hủy',
  position:'top'
}).then((result) => {
  if (result.value) {
    window.location.href = url;
  }
})
})


});

$('#tb').DataTable( {
  "language": {
    "lengthMenu": "Hiển thị _MENU_",
    "zeroRecords": "Không tìm thấy",
    "info": "Hiển thị  trang thứ  _PAGE_ của _PAGES_ trang",
    "infoEmpty": "Không tìm thấy kết quả",        
    "infoFiltered": "(Đã lọc trong _MAX_ kết quả )",
    "search":         "Tìm kiếm:",
  },
  'ordering'    : false,
  'autoWidth'   : false,
  'searching'   : true,
  'autoWidth'   : false,
  "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]]
} ); 

