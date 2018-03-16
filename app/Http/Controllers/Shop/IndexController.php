<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Product;
use App\Model\Category;

class IndexController extends Controller
{
	public function __construct(Product $objmProduct, Category $objmCategory){
		$this->objmProduct = $objmProduct;
		$this->objmCategory = $objmCategory;
	}
    public function index()
    {
    	$objNew  = $this->objmProduct->getItemsNew();
    	$objFeatureActive  = $this->objmProduct->getItemsFeature(0,3);
    	$objFeature  = $this->objmProduct->getItemsFeature(3,3);
    	return view('shop.index.index',compact('objNew','objFeatureActive','objFeature'));
    }
}
