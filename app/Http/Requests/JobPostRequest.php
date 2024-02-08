<?php

namespace App\Http\Requests;

use App\Models\JobPost;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class JobPostRequest extends FormRequest
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

     */
    public function rules(): array
    {

        return [
            // 'job_title' => 'required|string|max:255',
            // 'description' => 'required|string|max:8000',
            // 'requirement' => 'required|string|max:1000',
            // 'currency' => 'required|integer',
            // 'salary' => 'string|max:100',
            // 'city' => 'required|integer',
            // // 'city_id' => [
            // //     'required',
            // //     Rule::exists('cities', 'id')
            // // ],
            // 'job_type' => 'required|integer',
            // 'closing_date' => 'required|date',
            'job_status' => 'required',
            'job_title' => 'required|string',
            "description" => 'required|string',
            "requirement" => 'required|string',
            "currency" => 'required|integer',
            "salary" => 'string|max:100',
            "city_id" => 'required|integer',
            'job_type' => 'required|integer',
            "closing_date" => 'required|date',
            "job_status" => 'required'
        ];
    }

    // protected function passedValidation(): void
    // {
    //     // If 'salary' is not provided by the user, set it to the default value
    //     $this->merge([
    //         'salary' => $this->input('salary', 'Negotative'),
    //     ]);
    // }
}
