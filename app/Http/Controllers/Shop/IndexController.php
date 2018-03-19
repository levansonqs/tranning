<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use Request as Requests;
use App\Http\Controllers\Controller;
use App\Model\Product;
use App\Model\Category;
use App\Model\Customer;
use App\Model\Order;
use App\Model\OrderDetail;
use DB, Cart, Session;

class IndexController extends Controller
{


	public function __construct(Product $objmProduct, Category $objmCategory){
		$this->objmProduct = $objmProduct;
		$this->objmCategory = $objmCategory;
	}
    public function index()
    {
        $objProduct = $this->objmProduct->getItems();    
    	$objNew  = $this->objmProduct->getItemsNew();
    	$objFeatureActive  = $this->objmProduct->getItemsFeature(0,3);
    	$objFeature  = $this->objmProduct->getItemsFeature(3,3);
    	return view('shop.index.index',compact('objNew','objFeatureActive','objFeature', 'objProduct'));
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
        $total = Cart::total();  
        // dd($total);
        return view('shop.news.cart',compact('content', 'total'));
    }
    public function xoasanpham($id){
        Cart::remove($id);
        return redirect()->route('giohang');
    }
    public function capnhat(Request $request){ 

        if ($request->ajax()) {
            $rowid = $request->rowId;
            $qty = $request->qty;
            $price = $request->price;
            $total = $qty * $price;
            Cart::update($rowid, $qty);
            return response()->json(['total'=>$total, 'rowid'=>$rowid]);
        }
    }  
    public function getDathang()
    {
        if (Session::has('cart')) {
            $cart = Cart::content();
            // dd($cart);
            $total = Cart::total(0, ",",".");  
            return view('shop.news.order', ['cart'=>$cart, 'total'=>$total]);
        }
    }

    public function postDathang(Request $req)
    {
        // dd(date('Y-m-d h:s:i'));
        $content = Cart::content();  
        $customer = new Customer;
        $customer->fullname = $req->fullname;
        $customer->email = $req->email;
        $customer->phone = $req->phone;
        $customer->note = $req->note;
        $customer->address = $req->address;
        // $customer->save();
        $idCustomer = Customer::insertGetId($customer->toArray());
        $order = new Order;
        $order->customer_id = $idCustomer;
        $order->order_date = date('Y-m-d h:s:i');
        $order->address = $customer->address;
        $order->total = $total = Cart::total(0, ",",".");
        // dd($order);
        // $order->save();
        $idOrder = Order::insertGetId($order->toArray());
            // dd($idOrder);

        foreach ($content as $value) {
            // dd($value);
            $orderDetail = new OrderDetail; 
            $orderDetail->order_id = $idOrder;
            $orderDetail->qty = $value->qty;
            $orderDetail->product_id = $value->id;
            $orderDetail->save();
        }
        return redirect()->route('shop.index.index');
    }
 }
