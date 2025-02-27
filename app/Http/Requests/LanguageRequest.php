<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LanguageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'logo_language' => $this->isMethod('post')
                ? 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
                : 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'origin_languages.*' => ['integer', 'exists:origin_languages,id'],
            'language_type_id' => 'required|exists:language_types,id',
        ];
    }

}
