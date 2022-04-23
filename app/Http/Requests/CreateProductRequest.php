<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CreateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        return $request->user() && $request->user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'uuid' => ['required', 'string', 'unique:products'],
            'name' => ['required', 'string', 'min:5'],
            'cost_price' => ['required', 'integer'],
            'selling_price' => ['required', 'integer'],
            'discount' => ['required', 'integer'],
            'image' => ['required', 'image:png,jpg,jpeg', 'max:5116'],
            'quantity' => ['required', 'integer'],
            'description' => ['required', 'string']
        ];
    }
}
