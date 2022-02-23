<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'string|required|unique:posts',
            'category_id' => 'required|not_in:0',
            'description' => 'string|required',
            'tags' => 'required',
            'image' => 'image|nullable',
            'content' => 'string|required',
            'status' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'The selected category is invalid'
        ];
    }
}
