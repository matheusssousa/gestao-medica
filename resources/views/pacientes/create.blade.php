@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Cadastrar Paciente</h5>
                    </div>
                    <div class="card-body">
                        <form id="search-form" action="{{ route('pacientes.store') }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <div class="form-group col-md-8">
                                    <label for="nome" class="form-label">{{ __('Nome') }}</label>
                                    <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') }}" required autocomplete="nome" autofocus placeholder="Nome do Paciente">
                                    @error('nome')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="cpf" class="form-label">{{ __('CPF') }}</label>
                                    <input id="cpf" type="text" class="form-control @error('cpf') is-invalid @enderror" name="cpf" value="{{ old('cpf') }}" required autocomplete="cpf" placeholder="999.999.999-99">
                                    @error('cpf')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-6">
                                    <label for="email" class="form-label">{{ __('E-mail') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-mail do Paciente">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="data_nascimento" class="form-label">{{ __('Data de nascimento') }}</label>
                                    <input id="data_nascimento" type="date" class="form-control @error('data_nascimento') is-invalid @enderror" name="data_nascimento" value="{{ old('data_nascimento') }}" required autocomplete="data_nascimento">
                                    @error('data_nascimento')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
                                <a href="{{ route('pacientes.index') }}" class="btn btn-secondary">Voltar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $('#cpf').mask('000.000.000-00');
    
            $('#search-form').submit(function() {
                var cpf = $('#cpf').val().replace(/\D/g, '');
                $('#cpf').val(cpf);
            });
        });
    </script>
@endsection
