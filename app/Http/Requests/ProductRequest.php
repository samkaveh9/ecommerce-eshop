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
     * @return array
     */
    public function rules()
    {
        return [
            'product_name' => 'required|unique:products,product_name',
            'code' => 'required|numeric|unique:products,code|min:8',
            'quantity' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'brand_id' => 'required',
            'color' => 'required',
            'detail' => 'required',
            'images' => 'required',
            'images.*' => 'mimes:png,jpeg,jpg,bmp, gif, svg,webp'
        ];
    }
}
