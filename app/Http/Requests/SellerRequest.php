<?php

namespace App\Http\Requests;

use App\Http\Exceptions\UnprocessableEntityException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;

class SellerRequest extends FormRequest
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
            'name' => 'required|min:3|max:50',
            'email' => [
                'required',
                'min:10',
                'max:100',
                Rule::unique('sellers')->ignore($this->seller),
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O nome é obrigatório',
            'name.min' => 'O campo nome não possui o mínimo de caractéres',
            'name.max' => 'O campo nome possui caractéres demais',
            'email.required' => 'O email é obrigatório',
            'email.min' => 'O campo email não possui o mínimo de caractéres',
            'email.max' => 'O campo email possui caractéres demais',
            'email.unique' => 'O email inserido já existe'
        ];
    }
}
