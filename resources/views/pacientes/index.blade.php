@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 d-flex flex-column gap-3">
                <div class="card p-3" style="background-color: white;">
                    <h5>Pacientes</h5>
                    <hr>
                    <form id="search-form" action="{{ route('pacientes.index') }}">
                        <div class="card-body p-0 mb-3">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="nome">Nome do Paciente</label>
                                    <input type="search" class="form-control" id="textfield1" name="nome"
                                        value="{{ request()->nome ?? '' }}" placeholder="Nome do Paciente">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="email">E-mail</label>
                                    <input type="search" class="form-control" id="textfield2" name="email"
                                        value="{{ request()->email ?? '' }}" placeholder="E-mail do Paciente">
                                </div>
                                <div class="col-md-2 form-group">
                                    <label for="cpf">CPF</label>
                                    <input type="search" class="form-control" id="cpf" name="cpf"
                                        value="{{ request()->cpf ?? '' }}" placeholder="999.999.999-99">
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('pacientes.create') }}" class="btn btn-outline-success">Cadastrar</a>
                            <div>
                                <button type="submit" class="btn btn-outline-info float-right">Pesquisar</button>
                                <a class="btn btn-outline-danger float-right" href="{{ route('pacientes.index') }}">Limpar
                                    Campos</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card p-3 bg-light">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">CPF</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pacientes as $paciente)
                                <tr>
                                    <td>{{ $paciente->nome }}</td>
                                    <td>{{ $paciente->email }}</td>
                                    <td>
                                        {{ substr($paciente->cpf, 0, 3) . '.' . substr($paciente->cpf, 3, 3) . '.' . substr($paciente->cpf, 6, 3) . '-' . substr($paciente->cpf, 9, 2) }}
                                    </td>
                                    <td>
                                        <a href="{{ route('pacientes.show', $paciente->id) }}"
                                            class="btn btn-sm btn-outline-secondary">Visualizar</a>
                                        <a href="{{ route('pacientes.edit', $paciente->id) }}"
                                            class="btn btn-sm btn-outline-primary">Editar</a>
                                        <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                            data-bs-target="#confirmDeleteModal"
                                            data-id="{{ $paciente->id }}">Excluir</button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Nenhum registro encontrado</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $pacientes->links() }}
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
                    Tem certeza de que deseja excluir este paciente?
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
        $(document).ready(function() {
            $('#cpf').mask('000.000.000-00');
        });

        var confirmDeleteModal = document.getElementById('confirmDeleteModal');
        confirmDeleteModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var id = button.getAttribute('data-id');
            var form = document.getElementById('delete-form');
            form.action = '/pacientes/' + id;
        });
    </script>
@endsection
