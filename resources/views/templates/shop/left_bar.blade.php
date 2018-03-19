<div class="left-sidebar">
    <h2>Category</h2>
    <div class="panel-group category-products" id="accordian">
        @foreach($objCats as $item)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordian" href="#{{ $item->name }}">
                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                            {{ $item->name }}
                        </a>
                    </h4>
                </div>
                <div id="{{ $item->name }}" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul>
                            @foreach($objSubCats as $value)
                                @if ($value->parent_id == $item->id)
                                    <li><a href="{{ route('shop.cate.indexCate', ['name'=>str_slug($value->name), 'id'=>$value->id]) }}">{{ $value->name }}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
   
    <!--/category-products-->
    <!--/brands_products-->

    <div class="price-range">
        <!--price-range-->
        <h2>Price Range</h2>
        <div class="well text-center">
            <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2"><br />
            <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
        </div>
    </div>
    <!--/price-range-->

    <div class="shipping text-center">
        <!--shipping-->
        <img src="/templates/shopping/images/home/shipping.jpg" alt="" />
    </div>
                        <!--/shipping-->

</div>