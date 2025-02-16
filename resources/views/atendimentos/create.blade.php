@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Cadastrar Atendimento</h5>
                    </div>
                    <div class="card-body">
                        <form id="search-form" action="{{ route('atendimentos.store') }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <div class="form-group col-md-6">
                                    <label for="paciente_id" class="form-label">{{ __('Paciente') }}</label>
                                    <select id="paciente" class="form-select @error('paciente_id') is-invalid @enderror"
                                        name="paciente_id" required>
                                        <option value="">Selecione o Paciente</option>
                                        @foreach ($pacientes as $paciente)
                                            <option value="{{ $paciente->id }}"
                                                {{ old('paciente_id') == $paciente->id ? 'selected' : '' }}>
                                                {{ $paciente->nome }}</option>
                                        @endforeach
                                    </select>
                                    @error('paciente')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="medico_id" class="form-label">{{ __('Médico') }}</label>
                                    <select id="medico" class="form-select @error('medico_id') is-invalid @enderror"
                                        name="medico_id" required>
                                        <option value="">Selecione o Médico</option>
                                        @foreach ($medicos as $medico)
                                            <option value="{{ $medico->id }}"
                                                {{ old('medico_id') == $medico->id ? 'selected' : '' }}>{{ $medico->nome }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('medico')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group">
                                    <label for="data_atendimento"
                                        class="form-label">{{ __('Data de Atendimento') }}</label>
                                    <input id="data_atendimento" type="date"
                                        class="form-control @error('data_atendimento') is-invalid @enderror"
                                        value="{{ old('data_atendimento') }}" name="data_atendimento" required>
                                    @error('data_atendimento')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
                                <a href="{{ route('atendimentos.index') }}" class="btn btn-secondary">Voltar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
