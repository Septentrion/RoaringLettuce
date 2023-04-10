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
        </header>
        <main>
            <section id="errors">
                @yield('errors')
            </section>
            @yield('main')
        </main>
    </body>
</html>
