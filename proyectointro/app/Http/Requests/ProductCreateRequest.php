<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProductCreateRequest extends FormRequest
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
            'name' => 'required',
            'price' => 'required|numeric|gt:0',
        ];
    }
    /*
    public function messages()
    {
        return [
            'name.required' => 'El :attribute es obligatorio',
            'price.required' => 'El :attribute es obligatorio',
            'price.numeric' => 'El :attribute debe ser numerico',
            'price.gt' => 'El :attribute debe ser mayor a 0'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nombre',
            'price' => 'precio'
        ];
    }
    */
    /**
     * @param Validator $validator
     * @throws \InvalidAttributeException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            "errors" => [
                "code" => "ERROR-1",
                "title" => "Unprocessable Entity"
            ]
        ], 422));
    }
}
