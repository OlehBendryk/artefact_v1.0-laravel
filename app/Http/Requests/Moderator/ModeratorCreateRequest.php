<?php

namespace App\Http\Requests\Moderator;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ModeratorCreateRequest extends FormRequest
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
        $moderator = $this->route('moderator');
        return [
            'name' => ['required', 'string','min:3', 'max:64'],
            'password' => ['required', 'confirmed', 'min:4', 'max:64'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('moderators')->ignore($moderator->id ?? null)],
            'role' => ['required', 'string', 'exists:roles,id'],
            'subdomain' => ['required', 'integer', 'exists:subdomains,id'],
        ];
    }
}

