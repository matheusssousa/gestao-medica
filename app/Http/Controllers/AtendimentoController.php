<?php

namespace App\Http\Controllers;

use App\Models\Atendimento;
use App\Http\Requests\StoreAtendimentoRequest;
use App\Http\Requests\UpdateAtendimentoRequest;
use App\Models\Medico;
use App\Models\Paciente;
use App\Repositories\Interfaces\AtendimentoRepositoryInterface;
use Illuminate\Http\Request;

class AtendimentoController extends Controller
{
    private $atendimentoRepository;

    public function __construct(AtendimentoRepositoryInterface $atendimentoRepository)
    {
        $this->atendimentoRepository = $atendimentoRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $atendimentos = $this->atendimentoRepository->getAll($request, 10);
        $medicos = Medico::select(['id', 'nome'])->get();
        $pacientes = Paciente::select(['id', 'nome'])->get();

        return view('atendimentos.index', compact('atendimentos', 'medicos', 'pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $medicos = Medico::select(['id', 'nome'])->get();
        $pacientes = Paciente::select(['id', 'nome'])->get();

        return view('atendimentos.create', compact('medicos', 'pacientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAtendimentoRequest $request)
    {
        $this->atendimentoRepository->create($request->all());
        return redirect()->route('atendimentos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Atendimento $atendimento)
    {
        $atendimento = $this->atendimentoRepository->getById($atendimento->id);

        return view('atendimentos.show', compact('atendimento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Atendimento $atendimento)
    {
        $atendimento = $this->atendimentoRepository->getById($atendimento->id);
        $medicos = Medico::select(['id', 'nome'])->get();
        $pacientes = Paciente::select(['id', 'nome'])->get();

        return view('atendimentos.edit', compact('atendimento', 'medicos', 'pacientes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAtendimentoRequest $request, Atendimento $atendimento)
    {
        $this->atendimentoRepository->update($atendimento->id, $request->all());
        return redirect()->route('atendimentos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Atendimento $atendimento)
    {
        $this->atendimentoRepository->delete($atendimento->id);
        return redirect()->route('atendimentos.index');
    }
}
