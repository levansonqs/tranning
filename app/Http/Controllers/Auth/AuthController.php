<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Hash;
use App\Model\User;
class AuthController extends Controller
{
    public function getLogin()
    {
    	return view('auth.login');
    }
    public function postLogin(Request $request){
        $this->validate($request,
            [
                'username' => 'required',
                'password' => 'required'
            ],
            [
                'username.required' => 'Vui lòng nhập tên đăng nhập',
                'password.required' => 'Vui lòng nhập mật khẩu',
            ]
        );
        $username = $request->username;
        $pass = $request->password;
        $login = [
            'username'  =>  $request->username,
            'password'  =>  $request->password,
        ];
        
        $objUser = User::where('username', '=', $username)->select('status')->get();
        // dd($login);
        foreach ($objUser as $value) {
            $status = $value['status'];
        }
        if ($username == '' || $pass == '') {
            return redirect()->back();
        }else{
            if (Auth::attempt($login)) {
                if ($status == 0) {
                    return redirect()->back();
                }else{
                    return redirect()->route('admin.index.index');
                }
            }else{
                return redirect()->back();
            }
        }
    }
    public function logout()
    {
    	Auth::logout();
    	return redirect()->route('auth.login');
    }
}
