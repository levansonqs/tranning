<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;
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


    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();
        // $token = $user->token;
        // $tokenSecret = $user->tokenSecret;
        // $userToken = Socialite::driver('facebook')->userFromToken($token);
        // return redirect()->route('admin.index.index');
        $find = User::whereEmail($user->getEmail())->first();
        if ($find) {
            Auth::login($find);
            // return $token = $user->token;
            return redirect()->route('admin.index.index');
        } else {
            $objUser = new user;
            $objUser->username = $user->getName();
            $objUser->fullname = $user->getName();
            $objUser->email = $user->getEmail();
            $objUser->avatar = $user->getAvatar();
            $objUser->status = 1;
            $objUser->level = 3;
            $objUser->save();
            Auth::login($objUser);
            return redirect()->route('admin.index.index');
        }
    }

}
