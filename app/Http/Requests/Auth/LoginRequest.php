<?php

namespace App\Http\Requests\Auth;


use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter; // To Control Login Attempts
use Illuminate\Support\Str; // For String Methods
use Illuminate\Validation\ValidationException; // For The Validation Exception


class LoginRequest extends FormRequest
{


    /**
     * Determine if the user is authorized to make this request.
     */

    public function authorize(): bool
    {
        return true; // Authorizes the user to make this request.
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */

    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
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
            'email.required' => 'The e-mail is required.',
            'email.email' => 'Please enter a valid e-mail address.',
            'password.required' => 'The password is required.',
        ];
    }


    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    public function authenticate(): void
    {

        $this->ensureIsNotRateLimited(); // Check for excessive retries.

        // Attempt to authenticate the user.

        if (! Auth::attempt($this->only('email', 'password'), $this->boolean('remember'))) {
            RateLimiter::hit($this->throttleKey()); // Logs a failed attempt.

            throw ValidationException::withMessages([
                'email' => trans('auth.failed'), // Laravel's default error message for login failure.
            ]);
        }

        RateLimiter::clear($this->throttleKey()); // Clear the attempt counter after success.

    }


    /**
     * Ensure the login request is not rate limited.
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    public function ensureIsNotRateLimited(): void
    {

        // Prevents brute force attacks by limiting the number of login attempts.

        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) { // Five attempts in one minute.
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);

    }


    /**
     * Get the rate limiting throttle key for the request.
     */

    public function throttleKey(): string
    {

        // Creates a unique key for controlling attempts.

        return Str::transliterate(Str::lower($this->string('email')).'|'.$this->ip());

    }


}