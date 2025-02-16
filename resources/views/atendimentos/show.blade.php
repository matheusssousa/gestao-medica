@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Visualizar Atendimento</h5>
                    </div>
                    <div class="card-body">
                        <div>
                            <h5>Informações do Paciente</h5>
                            <hr>
                            <div class="row mb-3">
                                <div class="form-group col-md-5">
                                    <label for="especialidade" class="form-label">{{ __('Nome') }}</label>
                                    <input id="nome" type="text" class="form-control" name="nome"
                                        value="{{ $atendimento->paciente->nome }}" disabled>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="email" class="form-label">{{ __('E-mail') }}</label>
                                    <input id="email" type="email" class="form-control" name="email"
                                        value="{{ $atendimento->paciente->email }}" disabled>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="cpf" class="form-label">{{ __('CPF') }}</label>
                                    <input id="cpf" type="text" class="form-control" name="cpf"
                                        value="{{ $atendimento->paciente->cpf }}" disabled>
                                </div>
                            </div>
                            <h5>Informações do Médico</h5>
                            <hr>
                            <div class="row mb-3">
                                <div class="form-group col-md-5">
                                    <label for="nome" class="form-label">{{ __('Nome') }}</label>
                                    <input id="nome" type="text" class="form-control" name="nome"
                                        value="{{ $atendimento->medico->nome }}" disabled>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="especialidade" class="form-label">{{ __('Especilidade') }}</label>
                                    <input id="especialidade" type="text" class="form-control" name="especialidade"
                                        value="{{ $atendimento->medico->especialidade }}" disabled>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="crm" class="form-label">{{ __('CRM') }}</label>
                                    <input id="crm" type="text" class="form-control" name="crm"
                                        value="{{ $atendimento->medico->crm }}" disabled>
                                </div>
                            </div>
                            <h5>Informação do Atendimento</h5>
                            <hr>
                            <div class="row mb-3">
                                <div class="form-group">
                                    <label for="data_atendimento"
                                        class="form-label">{{ __('Data de Atendimento') }}</label>
                                    <input id="data_atendimento" type="date" class="form-control" name="data_atendimento"
                                        value="{{ $atendimento->data_atendimento->format('Y-m-d') }}" disabled>
                                </div>
                            </div>
                            <div class="text-end">
                                <a href="{{ route('atendimentos.index') }}" class="btn btn-secondary">Voltar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
