<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'c_name' => 'required|max:255|min:3|unique:categories,c_name,'.$this->id,
            'c_description' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'c_name.required' => 'Tên danh mục không được để trống',
            'c_name.max' => 'Tên danh mục không được quá 255 ký tự',
            'c_name.min' => 'Tên danh mục không được dưới 3 ký tự',
            'c_name.unique' => 'Tên danh mục đã tồn tại',
            'c_description.required' => 'Mô tả danh mục không được để trống',
        ];
    }
}
