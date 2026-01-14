@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Criar Novo Contato</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('contacts.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nome (Mínimo 6 caracteres)</label>
                    <input type="text" class="form-control" id="name" name="name" 
                            class="form-control" @error('name') is-invalid @enderror 
                            value="{{ old('name') }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" 
                        class="form-control" @error('email') is-invalid @enderror 
                        value="{{ old('email') }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="contact" class="form-label">Contato (9 dígitos):</label>
                    <input type="text" name="contact" id="contact" 
                           class="form-control @error('contact') is-invalid @enderror" 
                           value="{{ old('contact') }}" maxlength="9">
                    @error('contact')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-success">Salvar Contato</button>
                    <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection