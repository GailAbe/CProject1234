<?php

namespace App\Http\Requests\Household;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'household_number' => ['required', 'string', 'max:255'],
            'purok_name' => ['required', 'string'],
            'fhead_name' => ['required', 'string'],
            'fhead_gender' => ['required', 'string'],
            'fhead_bdate' => ['required', 'date'],
            'fhead_bplace' => ['required', 'string'],
            'fhead_cstatus' => ['required', 'string'],

            'memberId' => ['required', 'array'],
            'memberId.*' => ['nullable', 'exists:household_members,id'],

            'fullname' => ['nullable', 'array'],
            'fullname.*' => ['nullable'],
            'gender' => ['nullable', 'array'],
            'gender.*' => ['nullable'],
            'bdate' => ['nullable', 'array'],
            'bdate.*' => ['nullable'],
            'bplace' => ['nullable', 'array'],
            'bplace.*' => ['nullable'],
            'cstatus' => ['nullable', 'array'],
            'cstatus.*' => ['nullable']
        ];
    }

    public function message()
    {
        return [
            'household_number.required' => 'Household Number is required',
            'purok_name.required' => 'Purok Name is required',
            'family_head.required' => 'Family Head is required',
        ];
    }
}
