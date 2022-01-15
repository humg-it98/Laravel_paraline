<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
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
            'name' => 'required|unique:group|max:255|min:5',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Name không được phép để trống.',
            'name.unique' => 'Name đã được đăng kí.',
            'name.max' => 'Name không được phép dài quá 255 kí tự.',
            'name.min' => 'Name không được phép ngắn hơn 5 kí tự.',
            ];
    }
}
