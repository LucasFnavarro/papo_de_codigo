@extends('layouts.main_layout')
@section('page_title', 'Login')
@section('content')
    @include('layouts.nav_bar')

    <div class="container d-flex justify-content-center align-items-center" style="height: 110vh;">
        <div class="card p-4 bg-dark text-white" style="width: 650px;">
            <h2 class="text-center mb-4">Criar uma conta</h2>

            <form action="{{ route('authenticate') }}" method="POST" novalidate>
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" id="username" class="form-control" required>
                    @error('username')
                        <p class="text text-danger text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                    @error('email')
                        <p class="text text-danger text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                    @error('password')
                        <div class="text text-danger text-center">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Confirme a Senha</label>
                    <input type="password" name="password_confirmation" id="password" class="form-control" required>
                    @error('password')
                        <div class="text text-danger text-center">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Imagem de Perfil</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary w-100">Cadastrar</button>
            </form>

            <div class="text text-center text-danger mt-3">
                @if (session('invalid_login'))
                    {{ session('invalid_login') }}
                @endif
            </div>


            <div class="text-center mt-3">
                <a href="#" class="text-info">Esqueceu a senha?</a> |
                <a href="{{ route('register') }}" class="text-info">Criar conta</a>
            </div>
        </div>
    </div>
@endsection
