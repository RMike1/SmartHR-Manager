<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
                'employee_first_name'=>'required|min:3',
               'employee_second_name'=>'required|min:3',
               'employee_identity'=>'required',
               'employee_email'=>'required|email',
               'employee_phone'=>'required',
               'employee_passcode'=>'required',
               'employee_description'=>'required',
               'is_leader'=>'nullable',
               'employee_image'=>'required',
               'department_id'=>'required',
               'job_title_id'=>'required',
               'joining_date'=>'required',
        ];
    }
    public function messages(): array
    {
        return [
            'employee_first_name'=>['required'=>'First Name is required','min'=>'Please First Name must be at least 3 characters..'],
            'employee_second_name'=>['required'=>'Second Name is required','min'=>'Please Second Name must be at least 3 characters..'],
            'job_title_id'=>['required'=>'Employee Position field is required..'],
            'department_id'=>['required'=>'Department field is required..'],
        ];
    }
}
