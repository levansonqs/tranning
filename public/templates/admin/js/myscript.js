
$(document).ready(function() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $('.capnhat').click(function(){ 
    var _token = $("input[name='_token']").val();
    var rowId = $(this).attr("rowId");
    var qty = $("#qty").val();
    var url = window.location.origin+"/cap-nhat/"+rowId+"/"+qty;
    // alert(url);
    // return;
    $.ajax({
      url:url,
      type:'POST',
      cache:false,
      data:{  
        '_token':_token,
      },      
      success:function(data){       
          location.reload();
      },
      error:function(data){
        // alert("Có lỗi khi xử lý")
      }
    })
  })

  $('.orderDetail').click(function(){ 
    var id = $(this).attr("orderid");
    var url = window.location.origin+'/admin/orderdetail/'+id;      
    $.ajax({
      url:url,
      type:'POST',
      cache:false,
      data:{  
        'id':id,
      },      
      success:function(data){       
        $("#orderDetail").html(data);
      },
      error:function(data){
        // alert("Có lỗi khi xử lý")
      }
    })
  })

  $('#send').click(function(){
   var _token = $("input[name='_token']").val();
   var url = window.location.origin+'/contact';  
   var fullname  = $('input[name="fullname"]').val()  ;
   var email  = $('input[name="email"]').val()  ;
   var message  = $('#message').val()  ;
      // alert(_token) ;
      // return;
      $.ajax({
        url:url,
        type:'POST',
        cache:false,
        data:{  
          '_token':_token,'fullname':fullname,'email':email,'message':message
        },      
        success:function(data){       
          swal(
            'Gửi thành công !',
            'Cảm ơn bạn đã góp ý !',
            'success'
            ).then((result) => {
              if (result.value) {
                window.location.href = window.location.origin;
              }
            });
            
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

