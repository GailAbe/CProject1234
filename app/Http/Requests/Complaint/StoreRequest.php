<?php

namespace App\Http\Requests\Complaint;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'complainant' => ['required'],
            'date_time' => ['required'],
            'witness' => ['nullable'],
            'complaint_to' => ['required'],
            'notes' => ['required'],
        ];
    }

    public function message()
    {
        return [
            'complainant.required' => 'Complainant is required',
            'date_time.required' => 'Date and Time is required',
            'complaint_to.required' => 'Complaint To is required',
            'notes.required' => 'Notes is required',
        ];
    }
}
