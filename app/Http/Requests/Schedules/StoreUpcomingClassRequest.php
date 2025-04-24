<?php

namespace App\Http\Requests\Schedules;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpcomingClassRequest extends FormRequest
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
            'morning_link' => ['required', 'string', 'url'],
            'afternoon_link' => ['required', 'string', 'url'],
        ];
    }
}
