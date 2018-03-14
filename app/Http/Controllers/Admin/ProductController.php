<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Product;
use App\Model\Category;
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
		$objProduct = $this->objmProduct->getItem($id);
		return view('admin.product.edit',compact('objProduct'));
	}

	public function delete(Request $request, $id){
		$objProject = $this->objmProject->getItem($id);			
			//kiem tra xoa file
		$fileName = $objProject->picture;
		if($fileName != ''){	
			Storage::delete('public/files/'.$fileName);	
		}
		if($this->objmProject->delItem($id)){
			$request->session()->flash('msg','Xóa thành công');
			return redirect()->route('admin.project.index');
		}else{
			$request->session()->flash('msg','Lỗi khi xóa');
			return redirect()->route('admin.project.index');
		}			
	}


}
