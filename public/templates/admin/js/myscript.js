
$(document).ready(function() {

  $('.pDetail').click(function(){ 
    var _token = $("input[name='_token']").val();
    var id = $(this).attr("orderid");
    var url = window.location.origin+'/admin/orderdetail/'+id;  
    // alert(url) ;
    // return;
    $.ajax({
      url:url,
      type:'POST',
      cache:false,
      data:{  
        '_token':_token,'id':id,
      },      
      success:function(data){       
        $("#productDetail").html(data);
      },
      error:function(data){
        alert("Có lỗi khi xử lý")
      }
    })
  })


  $('.pDetail').click(function(){ 
    var _token = $("input[name='_token']").val();
    var id = $(this).attr("pid");
    var url = window.location.origin+'/admin/productdetail/'+id;  
    // alert(url) ;
    // return;
    $.ajax({
      url:url,
      type:'POST',
      cache:false,
      data:{  
        '_token':_token,'id':id,
      },      
      success:function(data){       
        $("#productDetail").html(data);
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

$('#tbProduct').DataTable( {
 "language": {
  "url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Vietnamese.json"
},
'ordering'    : false,
'autoWidth'   : false,
'searching'   : true,
'autoWidth'   : false,
"lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]]
} ); 

