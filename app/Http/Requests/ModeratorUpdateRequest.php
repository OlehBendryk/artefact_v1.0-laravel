<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ModeratorUpdateRequest extends FormRequest
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
//            'email' => ['string', 'email', 'max:255', Rule::unique('moderators')->ignore($moderator->id ?? null)],
//            'password' => ['confirmed', 'min:4', 'max:64'],
            'role' => ['integer', 'exists:roles,id'],
        ];
    }
}
