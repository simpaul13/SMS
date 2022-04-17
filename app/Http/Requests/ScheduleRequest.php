<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreScheduleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch (request()->method()) {
            case "POST":
                    return $this->createValidation();
            break;

            case "PUT":
                    return $this->updateValidation();
            break;
        }
    }

    protected function createValidation()
    {
        return [
            'course_id'     => 'required',
            'student_id'    => 'required',
            'teacher_id'    => 'required',
            'subject_id'    => 'required',
            'classroom_id'  => 'required',
            'starting_time' => 'required',
            'ending_time'   => 'required',
            'days'          => 'required',
        ];
    }

    protected function updateValidation()
    {
        return [
            'course_id'     => 'required',
            'student_id'    => 'required',
            'teacher_id'    => 'required',
            'subject_id'    => 'required',
            'classroom_id'  => 'required',
            'starting_time' => 'required',
            'ending_time'   => 'required',
            'days'          => 'required',
        ];
    }
}
