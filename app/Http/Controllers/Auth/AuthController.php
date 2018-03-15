<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;
use Auth;
use Hash;
use App\Model\User;
use Illuminate\Support\Facades\Input;
// use Input;
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
        $remember = Input::get('remember'); 
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
        if (Auth::attempt($login, $remember)) {
            if ($status == 0) {
                return redirect()->back();
            }else{
                return redirect()->route('admin.index.index');
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
        $find = User::whereEmail($user->getEmail())->first();
        if ($find) {
            Auth::login($find);
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

    //login google
    public function googleRedirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function googleHandleProviderCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();
        $find = User::whereEmail($user->getEmail())->first();
        if ($find) {
            Auth::login($find);
            return redirect()->route('admin.index.index');
        } else {
            $objUser = new user;
            $objUser->username = str_replace(' ','',$user->getName());
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

    //login twitter
    public function twitterRedirectToProvider()
    {
        return Socialite::driver('twitter')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function twitterHandleProviderCallback()
    {
        $user = Socialite::driver('twitter')->user();
        // dd($user);
        $find = User::whereEmail($user->getEmail())->first();
        if ($find) {
            Auth::login($find);
            return redirect()->route('admin.index.index');
        } else {
            $objUser = new user;
            $objUser->username = $user->nickname;
            $objUser->fullname = $user->name;
            $objUser->remember_token = $user->token;
            $objUser->email = $user->getEmail();
            $objUser->avatar = $user->avatar;
            $objUser->status = 1;
            $objUser->level = 3;
            $objUser->save();
            Auth::login($objUser);
            return redirect()->route('admin.index.index');
        }
    }
}
