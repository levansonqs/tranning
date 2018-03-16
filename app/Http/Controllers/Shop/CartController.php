<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Product;
use Cart;
use DB;
class CartController extends Controller
{

    public function indexCart()
    {
    	return view('shop.news.cart');
    }
// <<<<<<< HEAD

//     // public function post(){

//     // }
// =======
//     public function buy($id)
//     {
//     	$product_buy = DB::table('products')->where('id', $id)->first();
//     	Cart::add([['id' => $id, 'name' => $product_buy->name, 'qty' => $product_buy->qty, 'price' => $product_buy->price, 'options' => ['images' => $product_buy->images]],
		
// 		]);
// 		$content = Cart::content(); 
// 		print_r($content);
//     }
// >>>>>>> refs/remotes/origin/master
}
