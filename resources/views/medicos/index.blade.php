@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 d-flex flex-column gap-3">
                <div class="card p-3" style="background-color: white;">
                    <h5>Médicos</h5>
                    <hr>
                    <form id="search-form" action="{{ route('medicos.index') }}">
                        <div class="card-body p-0 mb-3">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="nome">Nome do Médico</label>
                                    <input type="search" class="form-control" id="textfield1" name="nome"
                                        value="{{ request()->nome ?? '' }}" placeholder="Nome do Médico">
                                </div>
                                <div class="col-md-2 form-group">
                                    <label for="crm">CRM</label>
                                    <input type="search" class="form-control" id="textfield2" name="crm"
                                        value="{{ request()->crm ?? '' }}" placeholder="CRM do Médico">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="especialidade">Especialidade</label>
                                    <input type="search" class="form-control" id="especialidade" name="especialidade"
                                        value="{{ request()->especialidade ?? '' }}" placeholder="Especialidade">
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('medicos.create') }}" class="btn btn-outline-success">Cadastrar</a>
                            <div>
                                <button type="submit" class="btn btn-outline-info float-right">Pesquisar</button>
                                <a class="btn btn-outline-danger float-right" href="{{ route('medicos.index') }}">Limpar
                                    Campos</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card p-3 bg-light">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 35%;">Nome</th>
                                <th scope="col" style="width: 25%;">Especialidade</th>
                                <th scope="col" style="width: 20%;">CRM</th>
                                <th scope="col" style="width: 20%;">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($medicos as $medico)
                                <tr>
                                    <td>{{ $medico->nome }}</td>
                                    <td>{{ $medico->especialidade }}</td>
                                    <td>{{ $medico->crm }}</td>
                                    <td>
                                        <a href="{{ route('medicos.show', $medico->id) }}"
                                            class="btn btn-sm btn-outline-secondary">Visualizar</a>
                                        <a href="{{ route('medicos.edit', $medico->id) }}"
                                            class="btn btn-sm btn-outline-primary">Editar</a>
                                        <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                            data-bs-target="#confirmDeleteModal"
                                            data-id="{{ $medico->id }}">Excluir</button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Nenhum registro encontrado</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $medicos->links() }}
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
                    Tem certeza de que deseja excluir este médico?
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
            form.action = '/medicos/' + id;
        });
    </script>
@endsection
