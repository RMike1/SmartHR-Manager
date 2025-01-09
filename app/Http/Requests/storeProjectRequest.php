<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeProjectRequest extends FormRequest
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
            'project_name'=>'required|max:255',
            'project_status'=>'nullable',
            'project_image'=>'required|file|max:3029',
            'project_budget'=>'required|max:255',
            'notification'=>'required|max:255',
            'project_priority'=>'required',
            'project_description'=>'required|max:500',
            'employee_id'=>'required|max:255',
            'category_id'=>'required|max:255',
            'start_date'=>'required|max:255',
            'end_date'=>'required|max:255',
        ];
    }
    public function messages(): array
    {
        return [
            'project_name'=>['required'=>'this field is required','max'=>'please must be atleast 255 characters'],
            'project_image'=>['required'=>'please this file field is required','file'=>'please must be file','max'=>'please must be atleast 255 characters'],
            'project_budget'=>['required'=>'this field is required','max'=>'please must be atleast 255 characters'],
            'notification'=>['required'=>'this field is required','max'=>'please must be atleast 255 characters'],
            'project_priority'=>['required'=>'this field is required'],
            'project_description'=>['required'=>'this field is required','max'=>'must be atlest 525 characters'],
            'employee_id'=>['required'=>'this field is required','max'=>'please must be atleast 255 characters'],
            'category_id'=>['required'=>'this field is required','max'=>'please must be atleast 255 characters'],
            'start_date'=>['required'=>'this field is required','max'=>'please must be atleast 255 characters'],
            'end_date'=>['required'=>'this field is required','max'=>'please must be atleast 255 characters'],
        ];
    }
}
