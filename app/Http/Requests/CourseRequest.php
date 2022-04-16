<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
            'course_code'           => 'required|unique:courses',
            'course_name'           => 'required',
            'course_description'    => 'required',
        ];
    }

    protected function updateValidation()
    {
        return [
            'course_code'           => 'required|unique:courses',
            'course_name'           => 'required',
            'course_description'    => 'required',
        ];
    }
}
