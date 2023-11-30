<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
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
            'email'                 => 'required|unique:users,email',
            'password'              => 'required|confirmed|min:6',
            'password_confirmation' => 'required',
            'phone'                 => 'required|min:10|numeric'
        ];
    }

    public function messages()
    {
        return [
            'email.required'                 => 'Email không được để trống',
            'email.unique'                   => 'Email đã tồn tại',
            'password_confirmation.required' => 'Mật khẩu xác nhận không được để trống',
            'password.required'              => 'Mật khẩu không được để trống',
            'password.confirmed'             => 'Mật khẩu xác nhận không khớp',
            'password.min'                   => 'Mật khẩu ít nhất 6 ký tự',
            'phone.required'                 => 'Số điện thoại không được để trống',
            // 'phone.max'                      => 'Số điện thoại phải lơn hơn 0',
            // 'phone.numeric'                 => 'Số điện thoại phải là số',

        ];
    }
}
