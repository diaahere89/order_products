<?php

namespace App\Http\Requests\Api\V1;

class UpdateOrderRequest extends BaseOrderRequest
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
            'data.attributes' => 'sometimes|array',
            'data.relationships' => 'sometimes|array',

            'data.attributes.user_id' => 'required|exists:users,id',
            'data.attributes.name' => 'sometimes|string',
            'data.attributes.description' => 'sometimes|string',
            'data.attributes.status' => 'sometimes|string|in:P,F,C',
            'data.attributes.date' => 'sometimes|date',
            'data.relationships.products' => 'sometimes|array',
            'data.relationships.products.*' => 'array',
            'data.relationships.products.*.id' => 'sometimes|exists:products,id',
            'data.relationships.products.*.quantity' => 'sometimes|integer|min:1',
            'data.relationships.products.*.price' => 'sometimes|numeric|min:0',
        ];
    }
}
