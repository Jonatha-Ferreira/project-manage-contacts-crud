@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-warning text-dark">
            <h2 class="mb-0">Editar Contato: {{ $contact->name }}</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('contacts.update', $contact->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Nome:</label>
                    <input type="text" name="name" id="name" 
                           class="form-control @error('name') is-invalid @enderror" 
                           value="{{ old('name', $contact->name) }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">E-mail:</label>
                    <input type="email" name="email" id="email" 
                           class="form-control @error('email') is-invalid @enderror" 
                           value="{{ old('email', $contact->email) }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="contact" class="form-label">Contato (9 dígitos):</label>
                    <input type="text" name="contact" id="contact" 
                           class="form-control @error('contact') is-invalid @enderror" 
                           value="{{ old('contact', $contact->contact) }}" maxlength="9">
                    @error('contact')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-warning">Atualizar Contato</button>
                    <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection