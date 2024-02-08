<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostedJobRequest extends FormRequest
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
}
