<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RentACarStoreRequest extends FormRequest
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
            'carId' => 'required|numeric',
            'Pick_up_location' => 'required|string|max:40',
            'drop_off_location' => 'required|string|max:40',
            'pick_up_date' => 'required|date|after_or_equal:today',
            'drop_off_date' => 'required|date|after_or_equal:pick_up_date',
            'time_pick' => 'required|string|max:40',
        ];
    }
}
