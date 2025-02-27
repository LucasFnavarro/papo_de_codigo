<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">{{ env('APP_NAME') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse ms-4" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Notícias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Últimos Posts</a>
                </li>
            </ul>
            <form class="d-flex">
                @csrf
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-light me-3" type="submit">Pesquisar</button>
            </form>

            @auth
            <a href="#" class="text-white ms-3 nav-link">Minha Conta</a>
            <a href="#" class="text-white ms-3 nav-link">Sair</a>
            @else
            <a href="#" class="text-white ms-3 nav-link">Login</a>
            <a href="#" class="text-white ms-3 nav-link">Cadastrar</a>

            @endauth

            <!-- Link após o campo de pesquisa -->
        </div>
    </div>
</nav>
