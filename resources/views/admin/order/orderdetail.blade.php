  @php
  // dd($objOrderDetail);
  @endphp
  <!-- Modal content-->
  <div class="modal-content">
  	<div class="modal-header">
  		<button type="button" class="close" data-dismiss="modal">&times;</button>
  		<h4 class="modal-title">Chi tiết đơn hàng</h4>
  	</div>
  	<div class="modal-body">
  		<table class="table table-hover">
  			<thead>
  				<tr>
  					<th>STT</th>
  					<th>Tên sản phẩm</th>
  					<th>Giá</th>
  					<th>Hình ảnh</th>
  				</tr>
  			</thead>
  			<tbody>
  				@php
  					$stt = 1;
            // dd($objOrderDetail);
  				@endphp
  				@foreach ($objOrderDetail as $item)
  				@php
  				$img = "images/".$item->images;
  				$urlImage = Storage::url($img);
  				@endphp
  				<tr>
  					<td> {{$stt++}} </td>
  					<td> {{$item->name}} </td>
  					<td>{{ number_format($item->total,"0",".",",") }} <i class="fas fa-dollar-sign"></i></td> 
  					<td><img src="{{ $urlImage}}" class="img-responsive thumbnail"></td> 	
  				</tr>
  				@endforeach
  				<tr>
  					<td colspan="3" rowspan="" headers=""> </td>
  					<td> <span class="text-danger">Tổng tiền :</span> {{ $item->total }}  <i class="fas fa-dollar-sign"></i></td>
  				</tr>
  			</tbody>
  		</table>
  	</div>
  </div>  

</div>
<div class="modal-footer">
	<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
</div>
</div>