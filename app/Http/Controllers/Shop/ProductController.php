<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Product;

class ProductController extends Controller
{
	public function __construct(Product $objmProduct){
		$this->objmProduct = $objmProduct;
	}

    public function indexProduct($name,$id)
    {	
    	$objProduct = $this->objmProduct->getItem($id);
    	return view('shop.news.product_detail',compact('objProduct'));
    }
}
