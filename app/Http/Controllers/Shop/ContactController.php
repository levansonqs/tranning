<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Contact;

class ContactController extends Controller
{
   	public function getContact(){
   		return  view('shop.news.contact');
   	}

   	public function contact(Request $request){
   			$contact = new Contact;
   			$contact->fullname = $request->fullname;
   			$contact->email = $request->email;
   			$contact->message = $request->message;
   			$contact->save();
   	}
}
