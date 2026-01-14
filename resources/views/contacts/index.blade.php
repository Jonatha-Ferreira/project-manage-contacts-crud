@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Lista de Contatos</h1>
    @auth
        <a href="{{ route('contacts.create') }}" class="btn btn-primary">Novo Contato</a>
    @endauth
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Contato</th>
                    <th width="200px">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($contacts as $contact)
                    <tr>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->contact }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-sm btn-info text-white">Ver</a>
                                
                                @auth
                                    <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                    
                                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" onsubmit="return confirm('Tem certeza?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                                    </form>
                                @endauth
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Nenhum contato encontrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection