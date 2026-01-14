@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white text-center">
                <h4 class="mb-0">Acesso Restrito</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="username" class="form-label">Usuário (admin):</label>
                        <input type="text" name="username" id="username" 
                            class="form-control @error('username') is-invalid @enderror" 
                            value="{{ old('username') }}" required autofocus>
                        @error('username')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Senha (123456):</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Entrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection