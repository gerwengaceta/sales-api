<?php

namespace App\Http\Requests\Product;

// use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $productId = $this->route('product');

        return [
            'category_id' => 'sometimes|exists:categories,id',
            'barcode_id' => 'nullable|string',
            'sku' => "sometimes|string|unique:products,sku,{$productId}",
            'product_name' => 'sometimes|string|max:255',
            'description' => 'nullable|string',
            'cost_price' => 'sometimes|numeric|min:0',
            'selling_price' => 'sometimes|numeric|min:0',
            'stock_quantity' => 'sometimes|integer|min:0',
            'minimum_stock' => 'sometimes|integer|min:0',
            'unit' => 'sometimes|string|max:50',
            'image' => 'nullable|string',
            'expiry_date' => 'nullable|date',
            'status' => 'sometimes|string|in:active,inactive',
        ];
    }
}
