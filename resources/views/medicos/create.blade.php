@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Cadastrar Médico</h5>
                    </div>
                    <div class="card-body">
                        <form id="search-form" action="{{ route('medicos.store') }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <div class="form-group col-md-8">
                                    <label for="nome" class="form-label">{{ __('Nome') }}</label>
                                    <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') }}" required autocomplete="nome" autofocus placeholder="Nome do Médico">
                                    @error('nome')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="crm" class="form-label">{{ __('CRM') }}</label>
                                    <input id="crm" type="text" class="form-control @error('crm') is-invalid @enderror" name="crm" value="{{ old('crm') }}" required autocomplete="crm" placeholder="CRM do Médico">
                                    @error('crm')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group">
                                    <label for="especialidade" class="form-label">{{ __('Especialidade') }}</label>
                                    <input id="especialidade" type="especialidade" class="form-control @error('especialidade') is-invalid @enderror" name="especialidade" value="{{ old('especialidade') }}" required autocomplete="especialidade" placeholder="Especialidade do Médico">
                                    @error('especialidade')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
                                <a href="{{ route('medicos.index') }}" class="btn btn-secondary">Voltar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
