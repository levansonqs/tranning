<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username'      => 'required|min:6|max:32|unique:users,username',
            'fullname'      => 'required',
            'password'      => 'required|min:6',
            'rePassword'    => 'required|same:password',
            'email'         => 'required|email|unique:users,email',
        ];
    }
    public function messages()
    {
        return [
            'username.required'     => 'Vui lòng nhập tên đăng nhập',
            'username.unique'       => 'Tên đăng nhập đã trùng',
            'username.min'          => 'Tên đăng nhập phải có ít nhất 6 kí tự',
            'username.max'          => 'Tên đăng nhập không được quá 32 kí tự',
            'fullname.required'     => 'Vui lòng nhập Họ và tên',
            'password.required'     => 'Vui lòng nhập mật khẩu',
            'password.min'          => 'Password phải có ít nhất 6 kí tự',
            'rePassword.required'   => 'Vui xác nhận mật khẩu ',
            'rePassword.same'       => 'Vui lòng nhập đúng mật khẩu',
            'email.required'        => 'Vui lòng nhập email',
            'email.unique'          => 'Email đã trùng',
        ];
    }
}
