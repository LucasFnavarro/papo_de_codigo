@extends('layouts.main_layout')
@section('page_title', 'Pág. Home')
@section('content')
    @include('layouts.nav_bar')


    @if (count($posts) == 0)
        <div class="text-center">
            <h2 class="text-center text-danger mt-5">Não encontramos nenhum POST</h2>
            <a href="#" class="btn btn-primary">+ Criar um Tópico</a>
        </div>
    @else
        <div class="container mt-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="text-dark">Fórum de Discussão</h2>
                <a href="#" class="btn btn-primary">+ Novo Tópico</a>
            </div>


            @foreach ($posts as $post)
                <div class="list-group m-3">
                    <!-- Exemplo de tópico -->
                    <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-1">{{ $post->title }}</h5>
                            <small>15 respostas</small>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p>{{ Str::limit($post->text, 40, '...') }}</p>
                        </div>
                        <p class="mb-1">Iniciado por <strong>{{ $post->user->username }}</strong> em
                            {{ $post->created_at->format('d/m/Y') }}</p>
                    </a>

                    <!-- Adicione mais tópicos dinamicamente -->
                </div>
            @endforeach



        </div>
    @endif


@endsection
