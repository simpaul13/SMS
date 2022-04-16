<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
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
            'teacher_firstname'  => 'required',
            'teacher_lastname'   => 'required',
            'teacher_middlename' => 'required',
            'teacher_username'   => 'required|unique:students',
            'teacher_password'   => 'required',
            'teacher_email'      => 'required|email|unique:students',
            // 'teacher_phone'      => 'required|digits:11',
            'teacher_address'    => 'required',
            'teacher_city'       => 'required',
            'teacher_zip'        => 'required',
            'teacher_country'    => 'required',
            'teacher_birthday'   => 'required',
            'teacher_gender'     => 'required|in:Male,Female'
        ];
    }

    protected function updateValidation()
    {
        return [
            'teacher_firstname'  => 'required',
            'teacher_lastname'   => 'required',
            'teacher_middlename' => 'required',
            'teacher_username'   => 'required|unique:students',
            'teacher_password'   => 'required',
            'teacher_email'      => 'required|email|unique:students',
            // 'teacher_phone'      => 'required|digits:11',
            'teacher_address'    => 'required',
            'teacher_city'       => 'required',
            'teacher_zip'        => 'required',
            'teacher_country'    => 'required',
            'teacher_birthday'   => 'required',
            'teacher_gender'     => 'required|in:Male,Female'
        ];
    }
}
