<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Product;
use App\Model\Category;
use DB, Cart;

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

    public function muahang($id){
        $product_buy = DB::table('products')->where('id',$id)->first(); 
        $pri = $product_buy->price;

        Cart::add(array('id'=>$id,'name'=>$product_buy->name,'qty'=> 1 , 'price'=>$pri,'options' => array('image'=>$product_buy->images,'discount'=>$product_buy->discount)));
        $content = Cart::content(); 
        // print_r($content);
        return redirect()->route('giohang');    /*print_r($content);;*/
    }

    public function giohang(){
        $content = Cart::content();  
        return view('shop.news.cart',compact('content'));
    }
    public function xoasanpham($id){
     Cart::remove($id);
     return redirect()->route('giohang');
 }
 public function capnhat($rowid,$qty){      
    $rowid = Request::post('rowId');
    $qty = Request::post('qty');
    Cart::update($id, $qty);  
}  
}
