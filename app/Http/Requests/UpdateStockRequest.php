<?php

namespace App\Http\Requests;

use App\Models\Product;
use App\Models\Unit;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStockRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        
        return [
            'qty'=>'required',
            'productId'=>['required',Rule::in(Product::pluck('id'))],
            'unitId'=>['required',Rule::in(Unit::GetAllowedForSaveParentId())],
        ];
    }
}
