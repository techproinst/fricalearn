<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreClassScheduleRequest extends FormRequest
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
        $rules = [
            'course_id' => ['required', 'exists:courses,id'],
            'continent' => ['required', 'string', 'in:africa_europe,australia_asia,usa_canada'],
            'day' => ['required', 'string', 'in:monday,wednessday,friday'],
            'morning' => ['required', 'string', 'date_format:H:i'],
            'afternoon' => ['required', 'string','date_format:H:i', 'after:morning'],
        ];

        if($this->getMethod() == 'POST') {
            $rules['course_id'] = ['required', Rule::unique('class_schedules')
                                                   ->where(
                                                    fn($query) => $query->where('continent',$this->continent)
                                                                        ->where('day', $this->day)
                                                     )];

        }elseif(in_array($this->getMethod(), ['PUT', 'PATCH'])){
            $scheduleId = $this->route('schedule');
            
            $rules['course_id'] = ['required', Rule::unique('class_schedules')->where(
                                                                              fn($query) => $query->where('continent', $this->continent)
                                                                              ->where('day', $this->day)
                                                                              )->ignore($scheduleId)
                                                                            ];

        }






        return $rules;
    }   
}
