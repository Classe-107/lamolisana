<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'title' => 'required|min:5|max:255|unique:products',
            'type' => 'required|max:50',
            'cooking_time' => 'required|max:30',
            'weight' => 'required|max:30',

        ];
    }
    /**
     * Summary of messages
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'Il campo titolo è obbligatorio',
            'title.min' => 'Il campo titolo deve avere almeno :min caratteri',
            'title.max' => 'Il campo titolo deve avere massimo :max caratteri',
            'type.required' => 'Il tipo è obbligatorio.',
            'type.max' => 'Il tipo non può superare i :max caratteri.',
            'cooking_time.required' => 'Il tempo cottura è obbligatorio.',
            'cooking_time.max' => 'Il tempo cottura non può superare i :max caratteri.',
            'weight.required' => 'Il peso è obbligatorio.',
            'weight.max' => 'Il peso non può superare i :max caratteri.',
        ];
    }
}
