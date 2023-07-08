<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $rules = ['email', 'max:255'];
        $rules[] = $this->input('id') ?
            Rule::unique(User::class)->ignore($this->input('id'))
            : Rule::unique(User::class)->ignore($this->user()->id);
        return [
            'name' => ['string', 'max:255'],
            'email' => $rules,
            'admin' => ['boolean']
        ];
    }
}
