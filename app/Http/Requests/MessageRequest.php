<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
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
            'name' =>'required|max:8',
            'message' => 'required|min:5|max:500',
        ];
    }

    public function withValidator($validator)
    {
        $validator->sometimes('mobile', 'required|integer|digits:11', function($input)
        {
            return empty($input->email);
        });
        $validator->sometimes('email', 'required|email', function($input){
            return empty($input->mobile);
        });
    }

    public function messages()
    {
        return [
            'name.required' => '姓名不能为空',
            'mobile.required' => '手机号不能为空',
            'mobile.integer' => '电话号码格式不正确',
            'mobile.size' => '手机号码长度不正确',
            'email.required' => '邮件地址不能为空',
            'email' => '电子邮件地址格式不正确',
            'message.required' => '留言内容不能为空',
        ];
    }

    
}
