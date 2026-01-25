<nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand text-white fw-bold" href="{{ route('inici') }}">📝 Blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('inici') }}">Inici</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('posts.index') }}">Llistat de posts</a>
                </li>
                
                @auth
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('posts.create') }}">➕ Nou post</a>
                    </li>
                @endauth
            </ul>
            
            <ul class="navbar-nav ms-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link btn btn-light btn-sm" href="{{ route('login') }}">Login</a>
                    </li>
                @else
                    <li class="nav-item">
                        <span class="navbar-text me-3 text-white">👋 Hola, {{ Auth::user()->login }}</span>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-light btn-sm">Logout</button>
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>