<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TasksFormRequest extends FormRequest
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
        return [
            "title" => "required",
            "status" => "required|boolean"
        ];
    }

    public function messages() {
        return [
            "title.required" => "Please fill the title input.",
            "status.required" => "Please select one of the input."
        ];
    }
}
