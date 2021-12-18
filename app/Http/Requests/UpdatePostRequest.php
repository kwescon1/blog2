<?php

namespace App\Http\Requests;

use App\Models\Post;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
        $post = Post::find($this->post);

        return [
            'title' => [
                'required', 'string',

                Rule::unique('posts')->ignore($post->title, 'title'),
            ],
            // 'title' => 'required|unique:posts,title,' . $this->title,
            'category_id' => 'required|not_in:0',
            'tags' => 'required',
            'image' => 'image|nullable',
            'content' => 'string|required',
            'status' => 'required'
        ];
    }
}
