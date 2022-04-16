<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'student_firstname'  => 'required',
            'student_lastname'   => 'required',
            'student_middlename' => 'required',
            'student_username'   => 'required|unique:students',
            'student_password'   => 'required',
            'student_email'      => 'required|email|unique:students',
            // 'student_phone'      => 'required|digits:11',
            'student_address'    => 'required',
            'student_city'       => 'required',
            'student_zip'        => 'required',
            'student_country'    => 'required',
            'student_birthday'   => 'required',
            'student_gender'     => 'required|in:Male,Female'
        ];
    }

    protected function updateValidation()
    {
        return [
            'student_firstname'  => 'required',
            'student_lastname'   => 'required',
            'student_middlename' => 'required',
            'student_username'   => 'required|unique:students',
            'student_password'   => 'required',
            'student_email'      => 'required|email|unique:students',
            // 'student_phone'      => 'required|digits:11',
            'student_address'    => 'required',
            'student_city'       => 'required',
            'student_zip'        => 'required',
            'student_country'    => 'required',
            'student_birthday'   => 'required',
            'student_gender'     => 'required|in:Male,Female'
        ];
    }
}
