@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Detalhes do Contato</h4>
                    <a href="{{ route('contacts.index') }}" class="btn btn-light btn-sm">Voltar para Lista</a>
                </div>

                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-sm-3 fw-bold">ID:</div>
                        <div class="col-sm-9 text-muted">#{{ $contact->id }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3 fw-bold">Nome Completo:</div>
                        <div class="col-sm-9">{{ $contact->name }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3 fw-bold">E-mail:</div>
                        <div class="col-sm-9">
                            <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3 fw-bold">Telefone/Contato:</div>
                        <div class="col-sm-9">{{ $contact->contact }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3 fw-bold">Criado em:</div>
                        <div class="col-sm-9 text-muted">{{ $contact->created_at->format('d/m/Y H:i') }}</div>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-warning">
                            Editar Dados
                        </a>

                        <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" 
                              onsubmit="return confirm('Deseja realmente mover este contato para a lixeira?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Excluir Contato</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection