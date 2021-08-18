<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SubdomainRequest extends FormRequest
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
        $subdomain = $this->route('subdomain');
        return [
            'name' => ['required', 'string', 'min:3', 'max:64', Rule::unique('subdomains')->ignore($subdomain->id ?? null)],
            'subdomain' => ['required', 'string', 'min:3', 'max:64', Rule::unique('subdomains')->ignore($subdomain->id ?? null)],
        ];
    }
}
