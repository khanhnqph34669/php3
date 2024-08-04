<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|integer',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'hagtag' => 'required|string|max:255',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array{
        return [
            'title.required' => 'Tiêu đề không được để trống',
            'title.string' => 'Tiêu đề phải là chuỗi',
            'title.max' => 'Tiêu đề không được vượt quá 255 ký tự',
            'slug.required' => 'Slug không được để trống',
            'slug.string' => 'Slug phải là chuỗi',
            'slug.max' => 'Slug không được vượt quá 255 ký tự',
            'content.required' => 'Nội dung không được để trống',
            'content.string' => 'Nội dung phải là chuỗi',
            'category_id.required' => 'Danh mục không được để trống',
            'category_id.integer' => 'Danh mục phải là số nguyên',
            'thumbnail.image' => 'Ảnh không đúng định dạng',
            'thumbnail.mimes' => 'Ảnh phải có định dạng jpeg, png, jpg, gif, svg',
            'thumbnail.max' => 'Ảnh không được vượt quá 2048 KB',
            'hagtag.required' => 'Hagtag không được để trống',
            'hagtag.string' => 'Hagtag phải là chuỗi',
            'hagtag.max' => 'Hagtag không được vượt quá 255 ký tự',
        ];
    }
}
