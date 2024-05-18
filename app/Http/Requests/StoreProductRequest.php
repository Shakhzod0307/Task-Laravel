<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'=>'required|max:255',
            'category_id'=>'required',
            'picture'=>'required|image|mimes:jpeg,png,jpg,gif',
            'short_description'=>'required',
            'full_description'=>'required',
        ];
    }
}
