<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            "name"=>"required|string|max:50",
            "email"=> "required|email",
            "password"=> "required|min:8|confirmed",
        ];
    }

    public function messages(): array
    {
        return [
            "name.required"=> "Name không được để trống",
            "name.string"=> "Name phải là chuỗi",
            "name.max"=> "Name không được vượt quá 50 ký tự",
            "email.required"=> "Email không được để trống",
            "email.email"=> "Email không đúng định dạng",
            "password.required"=> "Password không được để trống",
            "password.min"=> "Password phải lớn hơn 8 ký tự",
            "password.confirmed"=> "Password không trùng khớp",
        ];
    }
}
