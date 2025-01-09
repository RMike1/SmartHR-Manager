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
            'project_name'=>'required|max=255',
            'project_status'=>'required|max=255',
            'project_image'=>'required|file|max=3029',
            'project_budget'=>'required|max=255',
            'notification'=>'required|max=255',
            'project_priority'=>'required',
            'project_description'=>'required|max=500',
            'employee_id'=>'required|max=255',
            'category_id'=>'required|max=255',
            'start_date'=>'required|max=255',
            'end_date'=>'required|max=255',
        ];
    }
}
