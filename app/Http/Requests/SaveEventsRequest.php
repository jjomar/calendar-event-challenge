<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class SaveEventsRequest extends FormRequest
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
            'eventDescription' => 'required|max:255',
            'startDate' => 'required|date',
            'endDate' => 'required|date|after_or_equal:startDate',
            'dayOfWeeks' => ['required', 'array',  Rule::in([0, 1, 2, 3, 4, 5, 6])]
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'dayOfWeeks' => explode(',', $this->input('dayOfWeeks'))
        ]);
    }
    
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['result' => false, 'messages' => $validator->errors()->all()], 422));
    }
}
