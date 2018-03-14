<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Model\User;


class RegisterUserController extends Controller
{
	public function __construct(User $objmUser)
    {
        $this->objmUser = $objmUser;
    }

    public function getRegister()
    {
    	return view('auth.register');
    }
    public function postRegister(RegisterRequest $request)
    {
    	if ($this->objmUser->addItem($request)) {
            // $request->session()->flash('msg', 'Đăng ký thành công');
            return redirect()->route('auth.login');
        } else {
            // $request->session()->flash('msg', 'có lỗi khi đăng ký');
            return redirect()->route('auth.register');
        }
    }
}
