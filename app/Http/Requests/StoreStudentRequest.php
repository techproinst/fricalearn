<?php

namespace App\Http\Requests;

use App\Enums\CourseLevel;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreStudentRequest extends FormRequest
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
            'birthday' => ['required', 'date',],
            'gender' => ['required', 'string', 'in:male,female'],
            'course_level' => ['required', 'string', Rule::in(array_column(CourseLevel::cases(), 'value'))]
        ];
    }
}
