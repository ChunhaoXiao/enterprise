<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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
                'name' => 'required|unique:categories,name',
            ];
        }

        if($this->method() == 'PUT' || $this->method() == 'PATCH')
        {
            return [
                'name' => ['required', Rule::unique('categories')->ignore($this->category->id)],
            ];
        }
        return [];
    }

    public function messages()
    {
        return [
            'name.required' => '分类名称不能为空',
            'name.unique' => '分类名称已存在',
        ];
    }

}
