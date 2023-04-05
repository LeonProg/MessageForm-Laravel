<nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="">FeedBack</a>
        @auth
            <a href="{{ route('auth.logout') }}" class="navbar-light">Выйти</a>
        @endauth
        @guest
            <a href="{{ route('login') }}" class="navbar-light">Войти</a>
        @endguest
    </div>
</nav>
