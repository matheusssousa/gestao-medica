<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Http\Requests\StorePacienteRequest;
use App\Http\Requests\UpdatePacienteRequest;
use App\Repositories\Interfaces\PacienteRepositoryInterface;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    private $pacienteRepository;

    public function __construct(PacienteRepositoryInterface $pacienteRepository)
    {
        $this->pacienteRepository = $pacienteRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pacientes = $this->pacienteRepository->getAll($request, 10);

        return view('pacientes.index', compact('pacientes'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pacientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePacienteRequest $request)
    {
        $this->pacienteRepository->create($request->all());

        return redirect()->route('pacientes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Paciente $paciente)
    {
        $atendimentos = $paciente->atendimentos()->orderBy('data_atendimento', 'desc')->paginate(10);
        return view('pacientes.show', compact('paciente', 'atendimentos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paciente $paciente)
    {
        return view('pacientes.edit', compact('paciente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePacienteRequest $request, Paciente $paciente)
    {
        $this->pacienteRepository->update($paciente->id, $request->all());

        return redirect()->route('pacientes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paciente $paciente)
    {
        $this->pacienteRepository->delete($paciente->id);

        return redirect()->route('pacientes.index');
    }
}
