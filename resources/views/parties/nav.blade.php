<nav class="navbar navbar-expand-lg navbar-light bg-black">
    <ul class="navbar-nav ">
        <li class="nav-item"><a class="nav-link text-light" href="{{ route('home') }}">Home</a></li>
        @guest
        <li class="nav-item"><a class="nav-link text-light" href="{{ route('login.show') }}">Se Connecter</a></li>    
        @endguest
        <li class="nav-item"><a class="nav-link text-light" href="{{ route('profiles.index') }}">Tous Les Profiles</a>
        </li>
        <li class="nav-item"><a class="nav-link text-light" href="{{ route('settings.index') }}">Information</a></li>
        <li class="nav-item"><a class="nav-link text-light" href="{{ route('create') }}">Ajouter Profiles</a></li>
    </ul>
    @auth
    <div class="dropdown open">
        <button
            class="btn btn-secondary dropdown-toggle"
            type="button"
            id="triggerId"
            data-bs-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
        >
        {{Auth::user()->name}}
    </button>
        <div class="dropdown-menu" aria-labelledby="triggerId">
            <button class="dropdown-item" href="#">Action</button>
            <button class="dropdown-item">
                <a class="nav-link text-danger" href="{{ route('login.logout') }}">Se Déconnecter</a>
            </button>
        </div>
    </div>
        @endauth
</nav>
