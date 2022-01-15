<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|email|max:255|min:5',
            'password' =>'required|max:255|min:5',
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Email không được phép để trống.',
            'email.email' => 'Bạn nhập không phải email.',
            'email.max' => 'Email không được phép dài quá 255 kí tự.',
            'email.min' => 'Email không được phép ngắn hơn 5 kí tự.',
            'password.required' => 'Password không được phép để trống.',
            'password.max' => 'Password không được phép dài quá 255 kí tự.',
            'password.min' => ' Pass không được phép ngắn hơn 6 kí tự.',
        ];
    }
}
