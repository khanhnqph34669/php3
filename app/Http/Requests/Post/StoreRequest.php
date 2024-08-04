<?php

namespace App\Http\Requests\Post;

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
            "title" => "required|string|max:255",
            "content" => "required|string",
            "category_id" => "required|exists:categories,id",
            "thumbnail" => "nullable|image|mimes:jpeg,png,jpg,gif|max:2048",
            "slug" => "required|unique:posts,slug",
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array{
        return [
            "title.required" => "Tiêu đề không được để trống",
            "title.string" => "Tiêu đề phải là chuỗi",
            "title.max" => "Tiêu đề không được vượt quá 255 ký tự",
            "content.required" => "Nội dung không được để trống",
            "content.string" => "Nội dung phải là chuỗi",
            "category_id.required" => "Danh mục không được để trống",
            "category_id.exists" => "Danh mục không tồn tại",
            "thumbnail.required" => "Ảnh bìa không được để trống",
            "thumbnail.image" => "Ảnh bìa phải là ảnh",
            "thumbnail.mimes" => "Ảnh bìa phải có định dạng jpeg, png, jpg, gif",
            "thumbnail.max" => "Ảnh bìa không được vượt quá 2048 KB",
            "slug.required" => "Slug không được để trống",
            
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array{
        return [
            "title" => "Tiêu đề",
            "content" => "Nội dung",
            "category_id" => "Danh mục",
            "thumbnail" => "Ảnh bìa",
        ];
    }
}
