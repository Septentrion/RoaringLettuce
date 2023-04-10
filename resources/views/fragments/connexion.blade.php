<section>
    @if (auth()->user())
        <p>{{ auth()->user()->email }}</section</p>
        <p><a href="{{ route('logout') }}">Déconnexion</a></p>
    @else
        <nav class="menu flat secondary">
            <ul>
                <li><a href="{{ route('login') }}">Connexion</a></li>
                <li><a href="{{ route('register.create') }}">Enregistrement</a></li>
            </ul>
        </nav>
    @endif
</section>
