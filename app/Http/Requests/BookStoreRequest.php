<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookStoreRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'author' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|max:255',
            'image' => 'required|max:255',
            'vendor_id' => 'exists:vendors,id',
        ];
    }
}
