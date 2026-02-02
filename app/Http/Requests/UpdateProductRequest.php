<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProductRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('product_edit');
    }

    public function rules()
    {
        return [
            'description' => [
                'required',
            ],
            'categories_id' => [
                'required',
                'integer',
            ],
            'sub_categories_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
