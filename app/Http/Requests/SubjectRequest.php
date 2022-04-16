<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubjectRequest extends FormRequest
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
            'subject_code'           => 'required|unique:courses',
            'subject_name'           => 'required',
            'subject_description'    => 'required',
        ];
    }

    protected function updateValidation()
    {
        return [
            'subject_code'           => 'required|unique:courses',
            'subject_name'           => 'required',
            'subject_description'    => 'required',
        ];
    }
}
