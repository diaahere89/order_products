<?php

namespace App\Http\Requests\Api\V1;

class StoreOrderRequest extends BaseOrderRequest
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
            'data' => 'required|array',
            'data.attributes' => 'required|array',
            'data.relationships' => 'required|array',
            
            'data.attributes.user_id' => 'required|exists:users,id',
            'data.attributes.name' => 'required|string',
            'data.attributes.description' => 'required|string',
            'data.attributes.status' => 'required|string|in:P,F,C',
            'data.attributes.date' => 'required|date',
            'data.relationships.products' => 'required|array',
            'data.relationships.products.*' => 'array',
            'data.relationships.products.*.id' => 'required|exists:products,id',
            'data.relationships.products.*.quantity' => 'required|integer|min:1',
            'data.relationships.products.*.price' => 'required|numeric|min:0',
        ];
    }

}
