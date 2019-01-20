<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutRequest extends FormRequest
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
            'category' => 'required',

        ];
    }

    public function withValidator($validator)
    {
        $validator->sometimes('content', 'required', function($input){
            return in_array($input->category, ['overview', 'sales', 'scene']);
        });
        
        //$validator->sometimes(['address', 'phone', 'fax', 'email'], 'required', function($input){
           // return $input->category == 'contact';
        //});
       // $validator->sometimes(['title', 'content'], 'required', function($input){
            //return $input->category == 'case';
        //});

    }

    public function messages()
    {
        return [
            'category' =>'分类不能为空',
            'content.required' => '内容不能为空！！',
        ];
    }
}
