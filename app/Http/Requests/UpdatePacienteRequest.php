<?php

namespace App\Http\Requests;

use App\Rules\ValidCpf;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePacienteRequest extends FormRequest
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
            'nome' => 'string|max:255',
            'cpf' => [
                'string',
                'max:14',
                Rule::unique('pacientes', 'cpf')->ignore($this->route('paciente')),
                'cpf',
            ],
            'email' => [
                'string',
                'email',
                'max:255',
                Rule::unique('pacientes', 'email')->ignore($this->route('paciente')),
            ],
            'data_nascimento' => 'date',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'nome.string' => 'O campo nome deve ser uma string.',
            'nome.max' => 'O campo nome deve ter no máximo 255 caracteres.',
            'cpf.string' => 'O campo CPF deve ser uma string.',
            'cpf.max' => 'O campo CPF deve ter no máximo 14 caracteres.',
            'cpf.unique' => 'O CPF informado já está cadastrado.',
            'cpf.cpf' => 'O CPF informado não é válido.',
            'email.string' => 'O campo e-mail deve ser uma string.',
            'email.email' => 'O campo e-mail deve ser um e-mail válido.',
            'email.max' => 'O campo e-mail deve ter no máximo 255 caracteres.',
            'email.unique' => 'O e-mail informado já está cadastrado.',
            'data_nascimento.date' => 'O campo data de nascimento deve ser uma data.',
        ];
    }
}
