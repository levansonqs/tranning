@extends('templates.shop.master')
@section('main-content')
<div class="col-sm-9 padding-right">
    <div class="features_items">
        <!--features_items-->
        <h2 class="title text-center">Sản phẩm mới nhất</h2>
        @php
                // dd($objFeatureFirst->toArray());
        @endphp
        @foreach ($objNew as $item)
        @php
        $urlPic = "storage/images/".$item->images;
        $urlDetail = str_slug($item->name)."-".$item->id.".html";
        @endphp
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="{{$urlPic}}" alt="" style="width: " />
                        <h2>{{$item->price}} $</h2>
                        <p>{{$item->name}}</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                    </div>
                    <div class="product-overlay">
                        <div class="overlay-content">
                            <p>{{$item->description}} </p>
                            <a href="{{ $urlDetail }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Xem chi tiết</a>
                            <a href="{{route('muahang', ['id' => $item->id, 'tensanpham' => str_slug($item->name) ])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!--features_items-->
    {{-- <div class="category-tab">
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                @foreach($objCats as $item)
                    <li class="active"><a href="{{ $item->name }}" data-toggle="tab">{{ $item->name }}</a></li>
                @endforeach
            </ul>
        </div>
        @php
            dd($objProduct);
        @endphp
        <div class="tab-content">
            <div class="tab-pane fade active in" id="tshirt">
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="/templates/shopping/images/home/gallery1.jpg" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!--/category-tab-->

    <div class="recommended_items">
        <!--recommended_items-->
        <h2 class="title text-center">Sản phẩm nổi bật</h2>

        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="item active">
                    @foreach ($objFeatureActive as $item)
                    @php
                    $urlPic = "/storage/images/".$item->images;
                    @endphp
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="/templates/shopping/images/home/recommend1.jpg" alt="" />
                                    <h2>{{$item->price}} $</h2>
                                    <p> {{$item->description}} </p>
                                    <a href="{{route('muahang', ['id' => $item->id, 'tensanpham' => str_slug($item->name) ])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                                </div>

                            </div>
                        </div>
                    </div>
                    @endforeach              
                </div>
                <div class="item">
                   <div class="item active">
                    @foreach ($objFeature as $item)
                    @php
                    $urlPic = "/storage/images/".$item->images;
                    @endphp
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="/templates/shopping/images/home/recommend1.jpg" alt="" />
                                    <h2>{{$item->price}} $</h2>
                                    <p> {{$item->description}} </p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                                </div>

                            </div>
                        </div>
                    </div>
                    @endforeach   
                </div>
            </div>
            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
               <i class="fa fa-angle-left"></i>
           </a>
           <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
               <i class="fa fa-angle-right"></i>
           </a>
       </div>
   </div>
</div>
<!--/recommended_items-->
</div>
@endsection
