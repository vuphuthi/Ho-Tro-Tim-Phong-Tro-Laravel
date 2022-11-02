<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRoomRequest extends FormRequest
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
            'city_id'     => 'required',
            'district_id' => 'required',
            'wards_id'    => 'required',
            'name'        => 'required',
            'description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'city_id.required'     => 'Tỉnh thành không được để trống',
            'district_id.required' => 'Quận huyện không được để trống',
            'wards_id.required'    => 'Phường xã không được để trống',
            'name.required'        => 'Tiêu đề không được để trống',
            'description.required' => 'Mô tả không được để trống',
        ];
    }
}
