
$(document).ready(function() {

  $('#addCat').click(function(){ 
    var _token = $("input[name='_token']").val();
    var url = window.location.origin+'/admin/category/add';  
    var name = $("input[name='name']").val(); 
    var description = $("#description").val(); 
    var parent_id = $("#parent_id").val(); 
    $('#myModal').modal('hide');
    alert(parent_id) ;
    return;
    $.ajax({
      url:url,
      type:'POST',
      cache:false,
      data:{  
        '_token':_token,'name':name,'description':description
      },      
      success:function(data){       
        if(data == "ok"){         
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

  $('.editCat').click(function(){     
    var  id = $(this).attr('id');
    var _token = $("input[name='_token']").val();
    var url = window.location.origin+'/admin/category/edit/'+id;  
    alert(_token); return ;
    $.ajax({
      url:url,
      type:'GET',
      cache:false,    
      data:{  
        '_token':_token,'id':id
      },      
      success:function(data){       
        $('#main-content').html(data);
      },
      error:function(data){
        alert("Có lỗi khi xử lý")
      }
    })
  })

  $('#editCatSave').click(function(){ 
    var _token = $("input[name='_token']").val();
    var  id =  $("input[name='editname']").attr('id');    
    var url = window.location.origin+'/admin/cat/edit/'+id;  
    var name = $("input[name='editname']").val();
    var description = $("#description").val();
     alert(description); return;
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

  jQuery('.statistic-counter').counterUp({
    delay: 10,
    time: 400
  });

  $('.alert').delay(3000).slideUp(600);


  $('a.delItem').click(function(e){
   e.preventDefault();
   // alert(1); return;
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
  "url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Vietnamese.json"
},
'ordering'    : false,
'autoWidth'   : false,
'searching'   : true,
'autoWidth'   : false,
"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
} ); 

