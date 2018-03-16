<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User;
use Storage;

class UserController extends Controller
{
	public function __construct(User $objmUser){
		$this->objmUser = $objmUser;
	}

	public function index(){
		$objUser = $this->objmUser->getItems();
		return view('admin.user.index',compact('objUser'));
	}

	public function getAdd(){
		return view('admin.user.add');
	}

	public function postAdd(Request $request ){
		if($request->file('image') != " "){
			$path = $request->file('image')->store('public/images');
			$tmp = explode("/",$path);
			$filename = end($tmp);
			$request->image = $filename;
		}else{
			$request->image = "";
		}
		if($this->objmUser->addUser($request)){
			$request->session()->flash('msg','Thêm thành công !');
			return redirect()->route('admin.user.index');
		}
	}
	public function getEdit($id){
		$objUser = $this->objmUser->getItem($id);
		return view('admin.user.edit',compact('objUser'));
	}
	public function postEdit(Request $request,$id){
		if($request->file('image') != " " ){
			$objUser = $this->objmUser->getItem($id);
			$img = "public/images/".$objUser->avatar;
			Storage::delete($img);
			$path = $request->file('image')->store('public/images');
			$tmp = explode("/",$path);
			$filename = end($tmp);
			$request->image = $filename;
		}
		if($this->objmUser->editItem($request,$id)){
			$request->session()->flash('msg','Xóa user thành công !');
			return redirect()->route('admin.user.index');
		}
	}

	public function delete(Request $request,$id){		
		$objUser = User::find($id);
		$img = "public/images/".$objUser->avatar;
		$exists = Storage::disk('local')->exists($img);
		if($exists){
			Storage::delete($img);
		}		
		$result = $objUser->delete();
		if($result){
			$request->session()->flash('msg','Xóa user thành công !');
			return redirect()->route('admin.user.index');
		}
	}
}
