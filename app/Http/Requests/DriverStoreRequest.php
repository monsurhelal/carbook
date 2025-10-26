<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DriverStoreRequest extends FormRequest
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
            'image' => 'required|image|mimes:png,jpg',
            'driver_name' => 'required|string|max:50',
            'driver_email' => 'required|string|email|max:50',
            'driver_mobile' => 'required|numeric',
            'driver_password' => 'required|string|max:50|min:4',
        ];
    }
}
