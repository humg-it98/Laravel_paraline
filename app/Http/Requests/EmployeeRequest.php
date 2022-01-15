<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'email' => 'required|email|unique:employee|max:255|min:5',
            'first_name' => 'required',
            'last_name' => 'required',
            'birth_day' => 'required',
            'address' => 'required',
            'salary' => 'required|numeric',
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Email không được phép để trống.',
            'email.unique' => 'Eamil đã được đăng kí.',
            'email.max' => 'Email không được phép dài quá 255 kí tự.',
            'email.min' => 'Email không được phép ngắn hơn 5 kí tự.',
            'first_name.required' => 'Tên không được phép để trống.',
            'last_name.required' => 'Tên không được phép để trống.',
            'birth_day.required' => 'Ngày sinh mô tả không được để trống.',
            'address.required' => 'Địa chỉ không được phép để trống.',
            'salary.required' => 'Trường này không được phép để trống.',
            'salary.numeric' => 'Trường này sản phẩm phải là số.',
        ];
    }
}
