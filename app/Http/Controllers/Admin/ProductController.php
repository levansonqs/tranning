<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
	public function __construct(Product $objmProduct, Category $objmCategory){
		$this->objmProduct = $objmProduct;
		$this->objmCategory = $objmCategory;
	}

	public function index(){
		$objProduct = $this->objmProduct->getItems();
		return view('admin.product.index',compact('objProduct'));
	}
	public function getAdd(){
		$objCats = $this->objmCategory->getItems();
		return view('admin.product.add',['objCats'=>$objCats]);
	}

	public function postAdd(Request $request){
		if($request->hasFile('image')){			
			$path = $request->file('image')->store('public/images') ;			
			$tmp = explode('/',$path);
			$fileName = end($tmp);
			$request->fileName = $fileName;
		}else{
			echo "Lỗi upload";
		}	

		if($this->objmProduct->addItem($request)){
			$request->session()->flash('msg','Thêm thành công');
			return redirect()->route('admin.product.index');
		}
	}

	public function getEdit($id){

		$objmCategory = $this->objmCategory->getItems();
		$objProduct = Product::join('categories', 'products.cate_id', '=', 'categories.id')
                        // ->join('users', 'products.id_user', '=', 'users.id')
                        ->select('products.*', 'categories.name as catName', 'categories.parent_id as parent_id')
                        ->find($id);
		return view('admin.product.edit',compact('objmCategory','objProduct'));
	}

	public function postEdit(Request $request, $id){	
		$image = $request->file('image');
		if(!empty($image)){
			$objProject = $this->objmProduct->getItem($id);
			$fileName = $objProject->image;
			if(!empty($fileName)){
				Storage::delete('public/images/'.$fileName);	
			}
			//up hình mới vào
			$path = $request->file('image')->store('public/images/');
			$tmp = explode('/',$path);
			$nameNewimg = end($tmp);
			$request->image = $nameNewimg;
		}

		if($this->objmProduct->editItem($request,$id)){
			$request->session()->flash('msg','Cập nhật thành công');
			return redirect()->route('admin.product.index');
		}
	}

	public function delete(Request $request, $id){
		$objProject = $this->objmProduct->getItem($id);			
			//kiem tra xoa file
		$fileName = $objProject->image;
		if($fileName != ''){	
			Storage::delete('public/images/'.$fileName);	
		}
		if($this->objmProduct->delItem($id)){
			$request->session()->flash('msg','Xóa thành công');
			return redirect()->route('admin.product.index');
		}else{
			$request->session()->flash('msg','Lỗi khi xóa');
			return redirect()->route('admin.product.index');
		}			
	}


}
