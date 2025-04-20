<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UpdateParentModelRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string'],
            'password' => ['required'],
            // 'password' => ['required', Password::min(8)->letters()->mixedCase()->numbers()->symbols()->uncompromised()],
            'confirm_password' => ['required', 'same:password'],
            'profile_photo' => ['required', 'file', 'mimes:png,jpg,jpeg,pdf', 'max:1024'],

        ];
    }
}
