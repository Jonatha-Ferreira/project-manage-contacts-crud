<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
        $contactId = $this->route('contact') ? $this->contact?->id : null;

        return [
            'name' => 'required|string|min:6|max:255',
            'email' => [
                'required',
                'email',
                'unique:contacts,email,' . $contactId,
            ],
            'contact' => [
                'required',
                'digits:9',
                'unique:contacts,contact,' . $contactId,
            ],
        ];
    }
}
