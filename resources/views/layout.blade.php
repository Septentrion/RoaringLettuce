<html>
    <head>
        <title>Projet AMAP : @yield('title')</title>
        <link rel="stylesheet" href="/css/main.css" />
        @yield('shylesheets')
        @yield('scripts')
    </head>
    <body>
        <header class="layout">
            <h1>AMAP Saint-Martin</h1>
            <section>
                @include('fragments.menu')
                <aside>
                    @include('fragments.connexion')
                </aside>
            </section>
            {{--  Intégration de notification sous formes de « messages flash » --}}
            <div class="flash">
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                    </div>
                @endif
            </div>
        </header>
        <main>
            <section id="errors">
                @yield('errors')
            </section>
            @yield('main')
        </main>
    </body>
</html>
