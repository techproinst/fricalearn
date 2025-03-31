<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParentRegistrationRequest extends FormRequest
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
            'course_id' => ['required', 'integer', 'exists:courses,id'],
            'name' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'string', 'email:rfc,dns','max:255', 'unique:parents,email'],
            'email' => ['required', 'string', 'max:255', 'unique:parents,email'],
            'phone' => ['required', 'string'],
            'terms' => ['accepted'],
            
        ];
    }


}
