<?php

namespace App\Repositories\Eloquent;

use App\Models\Medico;
use App\Repositories\Interfaces\MedicoRepositoryInterface;

class MedicoRepository implements MedicoRepositoryInterface
{
    public function getAll($request = null, $perPage = 10)
    {
        return Medico::search($request)->paginate($perPage);
    }

    public function getById($id)
    {
        return Medico::with('atendimentos')->findOrFail($id);
    }

    public function create(array $data)
    {
        return Medico::create($data);
    }

    public function update($id, array $data)
    {
        $medico = Medico::findOrFail($id);
        $medico->update($data);
        return $medico;
    }

    public function delete($id)
    {
        return Medico::destroy($id);
    }
}
