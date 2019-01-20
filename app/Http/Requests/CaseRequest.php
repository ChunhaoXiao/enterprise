<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CaseRequest extends FormRequest
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
                'title' => 'required|min:3|max:30',
                'pictures' => 'required',
            ];
        }

        if($this->method() == 'PUT' || $this->method() == 'PATCH')
        {
            return [
                'title' => 'required|min:3|max:30',
            ];
        }
    }

    public function withValidator($validator)
    {
        if($this->method() == 'PUT')
        {
            $validator->sometimes('pictures', 'required', function($input){
                return empty($input->oldpictures);
            });
        }
    }
}
