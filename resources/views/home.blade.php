@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 d-flex flex-column gap-3">
                <div class="card" style="background-color: white;">
                    <div class="card-header">
                        <h5>Dashboard</h5>
                    </div>
                    <div class="card-body p-3">
                        <h5>Estatísticas</h5>
                        <hr>
                        <div class="row mt-4">
                            <div class="col">
                                <ul>
                                    <li>Atendimentos: {{ $atendimento_count }}</li>
                                    <li>Médicos: {{ $medicos_count }}</li>
                                    <li>Pacientes: {{ $pacientes_count }}</li>
                                </ul>
                            </div>
                        </div>
                        <h5>Médico com Mais Atendimentos</h5>
                        <hr>
                        <div class="col">
                            @if ($medico_mais_atendimentos)
                                <p>{{ $medico_mais_atendimentos->nome }}
                                    ({{ $medico_mais_atendimentos->atendimentos_count }} atendimentos)</p>
                            @else
                                <p>Nenhum médico encontrado</p>
                            @endif
                        </div>
                        <h5>Paciente com Mais Atendimentos</h5>
                        <hr>
                        <div class="col">
                            @if ($paciente_mais_atendimentos)
                                <p>{{ $paciente_mais_atendimentos->nome }}
                                    ({{ $paciente_mais_atendimentos->atendimentos_count }} atendimentos)</p>
                            @else
                                <p>Nenhum paciente encontrado</p>
                            @endif
                        </div>
                        <h5>Último Atendimento</h5>
                        <hr>
                        <table class="table tabl-hover">
                            <thead>
                                <tr>
                                    <th>Data de atendimento</th>
                                    <th>Médico</th>
                                    <th>Paciente</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($ultimo_atendimento)
                                    <tr>
                                        <td>{{ $ultimo_atendimento->data_atendimento->format('Y-m-d') }}</td>
                                        <td>{{ $ultimo_atendimento->medico->nome }}</td>
                                        <td>{{ $ultimo_atendimento->paciente->nome }}</td>
                                    </tr>
                                @else
                                    <tr>
                                        <td colspan="3">Nenhum atendimento encontrado</td>
                                    </tr>
                                @endif
                        </table>
                        <h5>Atendimentos Recentes</h5>
                        <hr>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Data de atendimento</th>
                                    <th>Médico</th>
                                    <th>Paciente</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($atendimentosRecentes as $atendimento)
                                    <tr>
                                        <td>{{ $atendimento->data_atendimento->format('Y-m-d') }}</td>
                                        <td>{{ $atendimento->medico->nome }}</td>
                                        <td>{{ $atendimento->paciente->nome }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
