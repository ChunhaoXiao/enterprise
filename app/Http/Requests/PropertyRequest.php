<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\CheckArray;

class PropertyRequest extends FormRequest
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
            'name' => [new CheckArray,'unique:properties,name'],
            'order.*' => 'nullable|integer',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '名称不能为空',
            'name.unique' => '属性名称已存在',
            'order.*.integer' => '排序必须是数字',
        ];
    }
}
