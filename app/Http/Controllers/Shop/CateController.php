<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Product;
class CateController extends Controller
{
	public function __construct(Product $objmProduct){
		$this->objmProduct = $objmProduct;
	}
    public function indexCate($name, $id)
    {
    	$objProduct = $this->objmProduct->getItemProducts($id);    
    	return view('shop.news.cate', compact('objProduct'));
    }
}
