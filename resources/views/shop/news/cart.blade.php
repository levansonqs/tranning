@include('templates.shop.header')   
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>

        </div>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="description text-center">Tên</td>
                        <td class="image">Hình ảnh</td>
                        <td class="price">Giá</td>
                        <td class="quantity">Số lượng</td>
                        <td class="quantity">Cập nhật</td>
                        <td class="quantity">Xóa</td>
                        <td class="total">Tổng tiền</td>
                    </tr>
                </thead>
                    <tbody>
                        @foreach ($content as $items)
                        <tr>
                            <td class="cart_description text-center">
                                <h4><a href="">{{$items->name}}</a></h4>
                            </td>
                            <td class="cart_product">
                                @php
                                    $url = "storage/images/".($items->options['image']);
                                    $prices = $items->price * $items->qty;
                                    
                                @endphp
                                <a href=""><img src="{{$url}}" class="img-responsive thumbnail" style="max-height: 120px;"></a>
                            </td>
                        
                            <td class="cart_price">
                                <p class="cart_price_content" >{{$items->price}} $</p>
                            </td>
                            <td class="cart_quantity">
                                <form  method="post" accept-charset="utf-8">
                                    {{csrf_field()}}
                                    <div class="cart_quantity_button">
                                        <a class="cart_quantity_down" href="javascript:void(0)"> - </a>
                                        <input class="cart_quantity_input" type="text" name="quantity" value="{{$items->qty}}" autocomplete="on" size="2" id="qty">
                                        <a class="cart_quantity_up" href="javascript:void(0)"> + </a>
                                    </div>
                                </form>
                            </td>
                            <td>
                                <a href="javascript:void(0)" id="capnhat" class="btn btn-success capnhat " price="{{$items->price}}" rowId={{$items->rowId}} qty={{$items->qty}}>Cập nhật</a>
                            </td> 
                            <td>
                                <a class="btn btn-danger" href="{{ route('xoasanpham', $items->rowId) }}">Xóa</a>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">{{$prices}} $</p>
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                    
                </table>
                <div>
                    <a href="{{ route('dathang') }}" style="float: right;" id="dathang" class="btn btn-primary">Đặt hàng</a>
                </div>
            </div>
        </div>
    </section> <!--/#cart_items-->
    @section('javascript')
        <script src="/javascripts/application.js" type="text/javascript" charset="utf-8" async defer>
        
    </script>
    @parent
    <script type="text/javascript">
        $('.cart_quantity_up').on('click', (e) => {
            let element = $(e.currentTarget).closest('tr').find('.cart_quantity_input')
            let value = parseInt(element.val())
            element.val(value+1)
            element.trigger('change')
        })
        $('.cart_quantity_down').on('click', (e) => {
            let element = $(e.currentTarget).closest('tr').find('.cart_quantity_input')
            let value = parseInt(element.val())
            element.val(value-1)
            element.trigger('change')
        })

        let quantityElement = $('.cart_quantity_input')
        quantityElement.on('change', function() {
            let quantity = $(this).val()
            if (quantity < 0 || quantity > 100 || quantity == '') {
                $(this).val(1)
                toastr.warning('Vui long nhap so luong lon hon 0')
            }    
        })
    </script>
    @endsection
    @include('templates.shop.footer')
