@extends('layouts.main_layout')
@section('page_title', 'Pág. Home')
@section('content')
    @include('layouts.nav_bar')


    @if (count($posts) == 0)
        <div class="text-center">

            @auth
                <h2 class="text-center text-danger mt-5 display-5">Não encontramos nenhuma publicação</h2>
                <a href="#" class="btn btn-primary">+ Criar um Tópico</a>
            @else
                <h2 class="text-center text-danger mt-5 display-5">Não encontramos nenhuma publicação</h2>
                <br>
                <p>Realize o <span class="text-success"><a href="{{ route('login') }}">LOGIN</a></span> ou <span><a
                            href="{{ route('register') }}">CRIE UMA NOVA CONTA</a></span> para publicar.</p>
            @endauth



        </div>
    @else
        <div class="container mt-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="text-dark">Posts</h2>
                <a href="#" class="btn btn-primary">+ Novo Tópico</a>
            </div>

            @foreach ($posts as $post)
                <div class="list-group m-3 position-relative">
                    <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-1">{{ $loop->iteration }}. {{ $post->title }}</h5>
                            <small>15 respostas</small>
                        </div>
                        <p>{{ Str::limit($post->text, 40, '...') }}</p>
                        <p class="mb-1">Iniciado por <strong>{{ $post->user->username }}</strong> em
                            {{ $post->created_at->format('d/m/Y') }}</p>
                    </a>
                </div>
            @endforeach

            {{-- Paginação --}}
            {{ $posts->links('pagination::bootstrap-5') }}

        </div>
    @endif


@endsection
