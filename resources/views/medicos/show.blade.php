@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Visualizar Médico</h5>
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="row mb-3">
                                <div class="form-group col-md-8">
                                    <label for="nome" class="form-label">{{ __('Nome') }}</label>
                                    <input id="nome" type="text" class="form-control" name="nome" value="{{ $medico->nome }}" disabled>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="crm" class="form-label">{{ __('CRM') }}</label>
                                    <input id="crm" type="text" class="form-control" name="crm" value="{{ $medico->crm }}" disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group">
                                    <label for="especialidade" class="form-label">{{ __('Especialidade') }}</label>
                                    <input id="especialidade" type="especialidade" class="form-control" name="especialidade" value="{{ $medico->especialidade }}" disabled>
                                </div>
                            </div>
                            <h5>Atendimentos</h5>
                            <hr>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Paciente</th>
                                        <th scope="col">Data de Atendimento</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($atendimentos as $atendimento)
                                        <tr>
                                            <td>{{ $atendimento->paciente->nome }}</td>
                                            <td>{{ $atendimento->data_atendimento->format('Y-m-d') }}</td>
                                        </tr>
                                    @endforeach
                                    {{ $atendimentos->links() }}
                                </tbody>
                            </table>
                            <div class="text-end">
                                <a href="{{ route('medicos.index') }}" class="btn btn-secondary">Voltar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
