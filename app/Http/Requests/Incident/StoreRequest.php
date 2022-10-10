<?php

namespace App\Http\Requests\Incident;

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
            'victim' => ['required'],
            'date' => ['required'],
            'location' => ['required'],
            'cause' => ['required'],
            'incident_description' => ['required'],
            'injury' => ['required'],
            'person_involved' => ['required']
        ];
    }

    public function message()
    {
        return [
            'victim.required' => 'Victim name is required',
            'date.required' => 'Date of incident is required',
            'location.required' => 'Location is required',
            'cause.required' => 'Cause of Incident is required',
            'incident_description.required' => 'Incident description is required',
            'injury.required' => 'Injury details is required',
            'person_involved.required' => 'Person involved is required',
        ];
    }
}
