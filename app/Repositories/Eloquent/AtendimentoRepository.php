<?php

namespace App\Repositories\Eloquent;

use App\Models\Atendimento;
use App\Repositories\Interfaces\AtendimentoRepositoryInterface;

class AtendimentoRepository implements AtendimentoRepositoryInterface
{
    public function getAll($request = null, $perPage = 10)
    {
        return Atendimento::with(['medico', 'paciente'])->orderBy('data_atendimento', 'desc')->search($request)->paginate($perPage);
    }

    public function getById($id)
    {
        return Atendimento::with(['medico', 'paciente'])->findOrFail($id);
    }

    public function create(array $data)
    {
        return Atendimento::create($data);
    }

    public function update($id, array $data)
    {
        $atendimento = Atendimento::findOrFail($id);
        $atendimento->update($data);
        return $atendimento;
    }

    public function delete($id)
    {
        return Atendimento::destroy($id);
    }
}
