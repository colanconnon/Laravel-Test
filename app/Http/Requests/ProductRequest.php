<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductRequest extends Request
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
            //
            'name' => 'Regex:$.{3,}$',
            'price' => 'required|numeric',
            'category_id' => 'numeric|required_if:price,50',
            'image_url' => 'url'
        ];
    }
}
