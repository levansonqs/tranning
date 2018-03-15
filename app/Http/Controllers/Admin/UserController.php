<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User;

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
		
		
		if($this->objmUser->addUser()){
			$request->session()->flash('msg','Thêm thành công !');
			return redirect()->route('admin.user.index');
		}
	}
}
