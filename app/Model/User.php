<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Hash;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'fullname', 'level', 'avatar', 'address', 'phone' 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

// <<<<<<< HEAD
//     public function setPasswordAttribute($value)
//     {
//         $this->attributes['password'] = bcrypt($value);
//     }
//     public function setLevelAttribute($value)
//     {
//         $this->attributes['level'] = 0 ;
//     }

// =======
//     // public function setPasswordAttribute($value)
//     // {
//     //     $this->attributes['password'] = bcrypt($value);
//     // }
//     // public function setAvatarAttribute($value)
//     // {
//     //     $this->attributes['avatar'] = 'public/images/userDefault.png';
//     // }
// >>>>>>> 3ce9ae820d9b7a04d5b025f8b0fe6883ba8c9654
    public function product() {
        return $this->hasMany('App\Model\Product', 'user_id');
    }


    public function addItem($request)
    {
        $this->username = $request->username;
        $this->fullname = $request->fullname;
        $this->email    = $request->email;
        $this->level    = 3;
        $this->status   = 1;
        $this->remember_token = $request->_token;
        $this->password = Hash::make($request->password);
        $this->avatar   = 'userDefault.png';
        return $this->save();
    }

    public function getItems(){
        return $this->all();
    }
}
