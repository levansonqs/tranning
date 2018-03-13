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
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'          => 'required|min:6|max:32|unique:users,username',
            'fullname'      => 'required',
            'password'      => 'required|min:6',
            'rePassword'    => 'required|same:password',
            'email'         => 'required|email|unique:users,email',
        ];
    }
    public function messages()
    {
        return [
            'name.required'         => 'Vui lòng nhập tên đăng nhập',
            'name.unique'           => 'Tên đăng nhập đã trùng',
            'name.min'              => 'Tên đăng nhập phải có ít nhất 6 kí tự',
            'name.max'              => 'Tên đăng nhập không được quá 32 kí tự',
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
