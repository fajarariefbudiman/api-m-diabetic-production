<?php

namespace App\Http\Requests;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'fullname' => 'required|string|max:255',
            'email' => 'nullable|email|unique:users,email',
            'phone_number' => 'nullable|string|max:20|unique:users,phone_number',
            'password' => 'required|string|min:8|confirmed',
            'birth_date' => 'required|date',
            'role' => 'nullable|in:user,admin',
            'gender' => 'nullable|in:male,female',
            'family_history' => 'nullable|string|max:255',
            'height' => 'nullable|numeric|min:0',
            'weight' => 'nullable|numeric|min:0',
            'bmi' => 'nullable|numeric|min:0',
            'diabetes_type' => 'nullable|string|max:255',
            'glucose_level' => 'nullable|numeric|min:0',
        ];
    }

    public function messages()
    {
        return [
            'fullname.required' => 'Nama lengkap wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'phone_number.unique' => 'Nomor telepon sudah terdaftar.',
            'password.required' => 'Kata sandi wajib diisi.',
            'password.min' => 'Kata sandi minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi kata sandi tidak cocok.',
            'gender.in' => 'Gender harus salah satu dari: male, female.',
            'role.in' => 'Role harus salah satu dari: user, admin.',
            'height.numeric' => 'Tinggi badan harus berupa angka.',
            'weight.numeric' => 'Berat badan harus berupa angka.',
            'bmi.numeric' => 'BMI harus berupa angka.',
            'glucose_level.numeric' => 'Glukosa harus berupa angka.',
        ];
    }
}
