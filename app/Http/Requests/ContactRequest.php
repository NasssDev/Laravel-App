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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'lastname' => 'required|string|max:55',
            'firstname' => 'required|string|max:55',
            'email' => 'required|string|email',
            'phone' => 'required|string',
            'phoneHiddenInput' => ['phone:INTERNATIONAL,FR'],
            'address' => 'required|string|max:100',
            'postalCode' => 'required|numeric|digits:5',
            'city' => 'required|string|max:55',
            'commentary' => 'required|string|max:255'
        ];
    }
}
