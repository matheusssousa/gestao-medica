<?php

namespace App\Http\Controllers;

use App\Models\Atendimento;
use App\Models\Medico;
use App\Models\Paciente;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $counts = [
            'atendimento_count' => Atendimento::count(),
            'medicos_count' => Medico::count(),
            'pacientes_count' => Paciente::count(),
        ];

        $ultimo_atendimento = Atendimento::latest()->first();

        $medico_mais_atendimentos = Medico::withCount('atendimentos')->orderByDesc('atendimentos_count')->first();
        $paciente_mais_atendimentos = Paciente::withCount('atendimentos')->orderByDesc('atendimentos_count')->first();

        $atendimentosRecentes = Atendimento::latest()->take(5)->get();

        return view('home', array_merge(
            $counts,
            compact(
                'ultimo_atendimento',
                'medico_mais_atendimentos',
                'paciente_mais_atendimentos',
                'atendimentosRecentes'
            )
        ));
    }
}
