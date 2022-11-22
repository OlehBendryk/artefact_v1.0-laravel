<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostCreateRequest extends FormRequest
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
            'subdomain_id' => ['required', 'integer', 'exists:subdomains,id'],
            'tag_id' => ['required', 'integer', 'exists:tags,id'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'moderator_id' => ['required', 'integer', 'exists:moderators,id'],
            'title' => ['required', 'min:3', 'max:255', Rule::unique('posts')->ignore($post->id ?? null)],
            'post' => ['required', 'min:3'],
            'is_active' => ['integer'],
            'is_top' => ['integer'],
        ];
    }
}

