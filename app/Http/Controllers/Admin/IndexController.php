<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(){
    	$title = 'Dasboard - AdminCP - VinaEnter';
    	return view('admin.index.index',['title'=>$title]);    	
    	//Ko compact thì Phải truyền theo Kiểu mảng
    }
}
