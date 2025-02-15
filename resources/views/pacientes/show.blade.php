@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h5>Visualizar Paciente</h5>
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="row mb-3">
                                <div class="form-group col-md-8">
                                    <label for="nome" class="form-label">{{ __('Nome') }}</label>
                                    <input id="nome" type="text" class="form-control" name="nome" value="{{ $paciente->nome }}" disabled>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="cpf" class="form-label">{{ __('CPF') }}</label>
                                    <input id="cpf" type="text" class="form-control" name="cpf" value="{{ $paciente->cpf }}" disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-6">
                                    <label for="email" class="form-label">{{ __('E-mail') }}</label>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ $paciente->email }}" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="data_nascimento" class="form-label">{{ __('Data de nascimento') }}</label>
                                    <input id="data_nascimento" type="date" class="form-control" name="data_nascimento" value="{{ $paciente->data_nascimento->format('Y-m-d') }}" disabled>
                                </div>
                            </div>
                            <h5>Atendimentos</h5>
                            <hr>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Médico</th>
                                        <th scope="col">Data de Atendimento</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($atendimentos as $atendimento)
                                        <tr>
                                            <td>{{ $atendimento->medico->nome }}</td>
                                            <td>{{ $atendimento->data_atendimento->format('Y-m-d') }}</td>
                                        </tr>
                                    @endforeach
                                    {{ $atendimentos->links() }}
                                </tbody>
                            </table>
                            <div class="text-end">
                                <a href="{{ route('pacientes.index') }}" class="btn btn-secondary">Voltar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $('#cpf').mask('000.000.000-00');
        });
    </script>
@endsection
