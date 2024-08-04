<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            "name"=> "required|string|max:255|unique:categories,name",
            "slug"=> "required|string|max:255|unique:categories,slug",
            "description"=> "nullable|string",
        ];
    }

    public function messages(): array{
        return [
            "name.required" => "Tên danh mục không được để trống",
            "name.string" => "Tên danh mục phải là chuỗi",
            "name.max" => "Tên danh mục không được vượt quá 255 ký tự",
            "name.unique"=> "Tên danh mục đã tồn tại trong hệ thống",
            "slug.required" => "Slug không được để trống",
            "slug.string" => "Slug phải là chuỗi",
            "slug.max" => "Slug không được vượt quá 255 ký tự",
            "slug.unique" => "Slug đã tồn tại",
            "description.string" => "Mô tả phải là chuỗi",
        ];
    }
}
