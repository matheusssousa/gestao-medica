@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 d-flex flex-column gap-3">
                <div class="card p-3" style="background-color: white;">
                    <h5>Atendimentos</h5>
                    <hr>
                    <form id="search-form" action="{{ route('atendimentos.index') }}">
                        <div class="card-body p-0 mb-3">
                            <div class="row mb-3">
                                <div class="col-md-6 form-group">
                                    <label for="medico">Médico</label>
                                    <select class="form-select" id="medico" name="medico">
                                        <option value="">Selecione um médico</option>
                                        @foreach ($medicos as $medico)
                                            <option value="{{ $medico->id }}"
                                                @if (request()->medico == $medico->id) selected @endif>
                                                {{ $medico->nome }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="paciente">Paciente</label>
                                    <select class="form-select" id="paciente" name="paciente">
                                        <option value="">Selecione um paciente</option>
                                        @foreach ($pacientes as $paciente)
                                            <option value="{{ $paciente->id }}"
                                                @if (request()->paciente == $paciente->id) selected @endif>
                                                {{ $paciente->nome }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6 form-group">
                                    <label for="data_inicio">Data Início</label>
                                    <input type="date" class="form-control" id="data_inicio" name="data_inicio"
                                        value="{{ request()->data_inicio }}">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="data_fim">Data Fim</label>
                                    <input type="date" class="form-control" id="data_fim" name="data_fim"
                                        value="{{ request()->data_fim }}">
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('atendimentos.create') }}" class="btn btn-outline-success">Cadastrar</a>
                            <div>
                                <button type="submit" class="btn btn-outline-info float-right">Pesquisar</button>
                                <a class="btn btn-outline-danger float-right"
                                    href="{{ route('atendimentos.index') }}">Limpar
                                    Campos</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card p-3 bg-light">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 30%;">Paciente</th>
                                <th scope="col" style="width: 30%;">Médico</th>
                                <th scope="col" style="width: 20%;">Data de atendimento</th>
                                <th scope="col" style="width: 20%;">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($atendimentos as $atendimento)
                                <tr>
                                    <td>{{ $atendimento->paciente->nome }}</td>
                                    <td>{{ $atendimento->medico->nome }}</td>
                                    <td>{{ $atendimento->data_atendimento->format('Y-m-d') }}</td>
                                    <td>
                                        <a href="{{ route('atendimentos.show', $atendimento->id) }}"
                                            class="btn btn-sm btn-outline-secondary">Visualizar</a>
                                        <a href="{{ route('atendimentos.edit', $atendimento->id) }}"
                                            class="btn btn-sm btn-outline-primary">Editar</a>
                                        <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                            data-bs-target="#confirmDeleteModal"
                                            data-id="{{ $atendimento->id }}">Excluir</button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Nenhum registro encontrado</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $atendimentos->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar Exclusão</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Tem certeza de que deseja excluir este atendimento?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <form id="delete-form" action="" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        var confirmDeleteModal = document.getElementById('confirmDeleteModal');
        confirmDeleteModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var id = button.getAttribute('data-id');
            var form = document.getElementById('delete-form');
            form.action = '/atendimentos/' + id;
        });
    </script>
@endsection
