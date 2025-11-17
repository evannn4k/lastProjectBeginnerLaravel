<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            "name" => "required",
            "price" => "required|integer",
            "stock" => "required|integer",
            "category_id" => "required|integer",
            "release_year" => "required|integer",
            "color" => "required",
            "made_in" => "required",
            "status" => "required",
            "image" => "nullable|image|mimes:jpg,png,jpeg,gif,webp|max:2048",
        ];
    }
}
