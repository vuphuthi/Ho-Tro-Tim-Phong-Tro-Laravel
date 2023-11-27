<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestAtm extends FormRequest
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

    public function rules()
    {
        return [
            'price' => 'required|numeric|min:10000',
        ];
    }

    public function messages()
    {
        return [
            'price.required' => 'Số tiền không được để trống',
            'price.min'      => 'Số tiền tối thiểu nạp là 10.000 đ',
        ];
    }
}
