<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMedicoRequest extends FormRequest
{
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
            'nome' => 'required|string|max:255',
            'crm' => 'required|string|max:255|unique:medicos',
            'especialidade' => 'required|string|max:255',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.string' => 'O campo nome deve ser uma string.',
            'nome.max' => 'O campo nome deve ter no máximo 255 caracteres.',
            'crm.required' => 'O campo CRM é obrigatório.',
            'crm.string' => 'O campo CRM deve ser uma string.',
            'crm.max' => 'O campo CRM deve ter no máximo 255 caracteres.',
            'crm.unique' => 'O CRM informado já está cadastrado.',
            'especialidade.required' => 'O campo especialidade é obrigatório.',
            'especialidade.string' => 'O campo especialidade deve ser uma string.',
            'especialidade.max' => 'O campo especialidade deve ter no máximo 255 caracteres.',
        ];
    }
}
