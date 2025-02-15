<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAtendimentoRequest extends FormRequest
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
            'paciente_id' => 'required|exists:pacientes,id',
            'medico_id' => 'required|exists:medicos,id',
            'data_atendimento' => 'required|date',
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
            'paciente_id.required' => 'O campo paciente é obrigatório',
            'paciente_id.exists' => 'O paciente informado não existe',
            'medico_id.required' => 'O campo médico é obrigatório',
            'medico_id.exists' => 'O médico informado não existe',
            'data_atendimento.required' => 'O campo data do atendimento é obrigatório',
            'data_atendimento.date' => 'O campo data do atendimento deve ser uma data válida',
        ];
    }
}
