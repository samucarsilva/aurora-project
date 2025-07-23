<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormRequestUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */

    public function authorize(): bool
    {
        return true; // If this form is for anyone to register.
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */

    public function rules(): array
    {

        return [
            'name' => ['required', 'string', 'max:255', 'regex:/^[\p{L}\s\'-]+$/u'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'terms' => ['required', 'accepted']
        ];

    }

    /**
     * Get custom messages for validation errors.
     *
     * @return array
     */

    public function messages(): array
    {

        return [
            'name.required' => 'The username is required.',
            'email.required' => 'The e-mail is required.',
            'email.email' => 'Please enter a valid e-mail address.',
            'email.unique' => 'This e-mail is already registered.',
            'password.required' => 'The password is required.',
            'password.min' => 'The password must have at least :min characters.',
            'terms.required' => 'You must accept the terms of use.',
            'terms.accepted' => 'Terms of use must be accepted',
        ];

    }

}
