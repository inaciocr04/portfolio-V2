<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'description' => 'required',
            'url_site' => 'nullable',
            'url_git' => 'nullable',
            'image_visuel' => $this->isMethod('post')
                ? 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
                : 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_deco1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_deco2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_deco3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_deco4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_deco5' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'languages.*' => ['integer', 'exists:languages,id'],
            'status' => 'required|string|in:en cours,terminé',
            'active' => 'nullable|boolean',
        ];
    }
}
