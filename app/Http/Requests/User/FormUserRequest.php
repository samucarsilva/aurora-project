<?php

namespace App\Http\Requests\User;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule; // Importing The Rule Class


class FormUserRequest extends FormRequest
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
     */

    public function rules(): array
    {

        // Ignoring the Logged-in User's Email

            $userID = Auth::user()->id;


        // Validation Rules For User Profile

            return [
                'name' => ['required', 'string', 'max:255', 'regex:/^[\p{L}\s\'-]+$/u'],
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($userID)],
                'password' => ['nullable', 'string', 'min:8'],
                'profile_picture_path' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            ];

    }


    /**
     * Get custom messages for validation errors.
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
            'profile_picture_path.image' => 'The uploaded file must be an image.',
            'profile_picture_path.mimes' => 'The image must be of the following type: jpg, jpeg, or png',
            'profile_picture_path.max' => 'The image cannot be larger than 2MB.',
        ];
    }


}