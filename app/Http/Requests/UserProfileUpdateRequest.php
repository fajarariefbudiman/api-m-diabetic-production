<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserProfileUpdateRequest extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'message' => 'Terjadi kesalahan pada data yang Anda kirimkan. Mohon periksa kembali.',
            'errors' => $validator->errors()
        ], 422));
    }
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'fullname' => 'sometimes|string|max:255',
            'gender' => 'sometimes|in:male,female,other',
            'birth_date' => 'sometimes|date',
            'phone_number' => 'sometimes|string|max:20|unique:users,phone_number,' . $this->user()->id,
            'family_history' => 'nullable|string',
            'height' => 'nullable|numeric|min:0',
            'weight' => 'nullable|numeric|min:0',
            'bmi' => 'nullable|numeric|min:0',
            'diabetes_type' => 'nullable|string',
            'glucose_level' => 'nullable|numeric|min:0',
        ];
    }
}
