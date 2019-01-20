<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
        if($this->method() == 'POST')
        {
            return [
            'name' => 'required|unique:products',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required',
            ];
        }
        if($this->method() == 'PUT' || $this->method() == 'PATCH')
        {
            return [
                'name' => ['required', Rule::unique('products')->ignore($this->product->id)],
                'category_id' => 'required|exists:categories,id',
                'description' => 'required',
            ];
        }
        
    }

    public function messages()
    {
        return [
            'name.required' => '产品名称不能为空',
            'name.unique' => '产品名称已经存在',
            'category_id.required' => '请选择分类',
            'category_id.exists' => '分类不存在',
            'description.required' => '产品描述不能为空',
        ];
    }
}
