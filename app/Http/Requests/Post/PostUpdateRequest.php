<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostUpdateRequest extends FormRequest
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
        $post = $this->route('post');

        return [
            'tag_id' => ['integer', 'exists:tags,id'],
            'category_id' => ['integer', 'exists:categories,id'],
            'moderator_id' => ['integer', 'exists:moderators,id'],
            'title' => ['min:3', 'max:255', Rule::unique('posts')->ignore($post->id ?? null)],
            'post' => ['min:3'],
            'is_active' => ['integer', ],
            'is_top' => ['integer', ],
        ];
    }
}

