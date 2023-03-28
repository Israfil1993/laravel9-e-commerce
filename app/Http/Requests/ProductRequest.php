<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|max:100',
            'keywords' => 'nullable',
            'description' => 'nullable',
            'image' => 'nullable',
            'category_id' => 'nullable',
            'user_id' => 'nullable',
            'price' => 'nullable',
            'quantity' => 'nullable',
            'minquantity' => 'nullable',
            'tax' => 'nullable',
            'detail' => 'nullable',
            'slug' => 'nullable|max:100',
            'status' => 'nullable'
        ];
    }
}
