<?php

namespace App\Http\Requests;

use App\Http\Exceptions\UnprocessableEntityException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class SaleRequest extends FormRequest
{
    public function failedValidation(Validator $validator)
    {
        return throw new UnprocessableEntityException($validator);
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'seller_id' => 'required',
            'value' => 'required|numeric',
            'sale_date' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'seller_id.required' => 'O vendedor é obrigatório',
            'value.required' => 'O valor é obrigatório',
            'value.numeric' => 'O valor deve ser um valor númerico',
            'sale_date.required' => 'A data da venda é obrigatória',
        ];
    }
}
