<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            'upload_file' => 'file|mimes:jpg,jpeg,png,gif|max:2048',
            'paper_cups' => 'nullable|string|max:255',
            'paper_bags_no_handle' => 'nullable|string|max:255',
            'paper_bags' => 'nullable|string|max:255',
            'plastic_cups' => 'nullable|string|max:255',
            'transparent_cups' => 'nullable|string|max:255',
            'reusable_cups' => 'nullable|string|max:255',
            'pizza_box' => 'nullable|string|max:255',
            'other' => 'nullable|string|max:255',
            'comment' => 'nullable|string|max:1000',
            'contact' => 'nullable|string|max:255',
            'company_name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'terms' => 'required|accepted'
        ];
    }
}
