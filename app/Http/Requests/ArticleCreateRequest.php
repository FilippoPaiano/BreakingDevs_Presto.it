<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleCreateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
        'title' => 'required|min:4',
        'condition' => 'required',
        'category' => 'required',
        'description' => 'required|min:10',
        'price' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Questo campo è obbligatorio *',
            'min' => 'Il campo :attribute è troppo corto',
            'numeric' => 'Il campo :attribute deve essere un numero',
        ];
    }
}
