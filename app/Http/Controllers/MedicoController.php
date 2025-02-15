<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use App\Http\Requests\StoreMedicoRequest;
use App\Http\Requests\UpdateMedicoRequest;
use App\Repositories\Interfaces\MedicoRepositoryInterface;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    private $medicoRepository;

    public function __construct(MedicoRepositoryInterface $medicoRepository)
    {
        $this->medicoRepository = $medicoRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $medicos = $this->medicoRepository->getAll($request, 10);

        return view('medicos.index', compact('medicos'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('medicos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMedicoRequest $request)
    {
        $this->medicoRepository->create($request->all());

        return redirect()->route('medicos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Medico $medico)
    {
        $atendimentos = $medico->atendimentos()->orderBy('data_atendimento', 'desc')->paginate(10);
        return view('medicos.show', compact('medico', 'atendimentos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medico $medico)
    {
        return view('medicos.edit', compact('medico'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMedicoRequest $request, Medico $medico)
    {
        $this->medicoRepository->update($medico->id, $request->all());

        return redirect()->route('medicos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medico $medico)
    {
        $this->medicoRepository->delete($medico->id);

        return redirect()->route('medicos.index');
    }
}
