<?php

namespace App\Repositories\Eloquent;

use App\Models\Paciente;
use App\Repositories\Interfaces\PacienteRepositoryInterface;

class PacienteRepository implements PacienteRepositoryInterface
{
    public function getAll($request = null, $perPage = 10)
    {
        return Paciente::search($request)->paginate($perPage);
    }

    public function getById($id)
    {
        return Paciente::findOrFail($id);
    }

    public function create(array $data)
    {
        return Paciente::create($data);
    }

    public function update($id, array $data)
    {
        $paciente = Paciente::findOrFail($id);
        $paciente->update($data);
        return $paciente;
    }

    public function delete($id)
    {
        return Paciente::destroy($id);
    }
}
